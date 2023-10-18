CREATE DATABASE  IF NOT EXISTS `booking_hotel` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `booking_hotel`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: booking_hotel
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Temporary view structure for view `vacant_room`
--

DROP TABLE IF EXISTS `vacant_room`;
/*!50001 DROP VIEW IF EXISTS `vacant_room`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `vacant_room` AS SELECT 
 1 AS `row_num`,
 1 AS `room_id`,
 1 AS `description`,
 1 AS `price`,
 1 AS `room_status`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vacant_room`
--

/*!50001 DROP VIEW IF EXISTS `vacant_room`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vacant_room` AS select row_number() over ( order by `room`.`room_id`) AS `row_num`,`room`.`room_id` AS `room_id`,`room_type`.`description` AS `description`,`room_type`.`price` AS `price`,case when `room`.`room_id` > 0 and (str_to_date('2023-10-17','%Y-%m-%d') >= str_to_date(`booking`.`checkin_date`,'%Y-%m-%d') and str_to_date('2023-10-17','%Y-%m-%d') < str_to_date(`booking`.`checkin_date`,'%Y-%m-%d') or str_to_date('2023-10-17','%Y-%m-%d') < str_to_date(`booking`.`checkout_date`,'%Y-%m-%d') and str_to_date(`booking`.`checkin_date`,'%Y-%m-%d') < str_to_date('2023-10-17','%Y-%m-%d')) then 'ไม่ว่าง' else 'ว่าง' end AS `room_status` from ((`room` join `room_type` on(`room`.`type_id` = `room_type`.`type_id`)) left join `booking` on(`room`.`room_id` = `booking`.`room_id`)) group by `booking`.`room_id` order by `room_type`.`description`,`room`.`room_id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping routines for database 'booking_hotel'
--
/*!50003 DROP PROCEDURE IF EXISTS `booking_room` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `booking_room`(

    IN prefix_ VARCHAR(45),

    IN firstname_ VARCHAR(45),

    IN lastname_ VARCHAR(45),

    IN phone_ VARCHAR(45),

    IN email_ VARCHAR(45),

    IN tourname_ VARCHAR(45),

    IN checkindate_ DATE,

    IN checkoutdate_ DATE,

    IN roomid_ INT(10)

)
BEGIN

    DECLARE sql_error TINYINT DEFAULT FALSE;

    DECLARE guestid_ INT;

    DECLARE tourid_ INT;



    -- Declare a handler for SQL exceptions

    DECLARE CONTINUE HANDLER FOR SQLEXCEPTION SET sql_error = TRUE;



    START TRANSACTION;



    -- Upsert guest

    CALL create_guest(prefix_, firstname_, lastname_, phone_, email_);



    -- Find guest id

    SELECT guest_id INTO guestid_ FROM guest WHERE firstname LIKE firstname_ AND lastname LIKE lastname_;



    -- Find tour id

    SELECT tourist_id INTO tourid_ FROM tourist WHERE name LIKE tourname_;



    -- Insert booking

    INSERT INTO booking (

        checkin_date,

        checkout_date,

        booking_date,

        commission,

        booking_status,

        tourist_id,

        guest_id,

        room_id

    ) VALUES (

        checkindate_,

        checkoutdate_,

        CURRENT_TIMESTAMP,

        0.07,

        'success',

        tourid_,

        guestid_,

        roomid_

    );



    IF sql_error = FALSE THEN

        COMMIT;

    ELSE

        ROLLBACK;

    END IF;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `create_guest` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `create_guest`(in prefix_ varchar(45), in firstname_ varchar(45), in lastname_ varchar(45), in phone_ varchar(45), in email_ varchar(45))
begin

	if ((select count(*) from guest where firstname like firstname_ and lastname like lastname_)=1) then

		update guest set prefix=prefix_, firstname=firstname_,  lastname=lastname_, email=email_, phone=phone_ where firstname like firstname_ and lastname like lastname_;

	else

		insert into guest (prefix,firstname,lastname,email,phone) values (prefix_,firstname_,lastname_,email_,phone_);

	end if;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `date_room_status` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `date_room_status`(in checkin date,in checkout date)
BEGIN
SELECT 
	ROW_NUMBER() OVER (ORDER BY room_id ASC) AS row_num,
    room_id,
    description,
    price,
    CASE
        WHEN SUM(CASE WHEN room_status = 'ไม่ว่าง' THEN 1 ELSE 0 END) > 0 THEN 'ไม่ว่าง'
        ELSE 'ว่าง'
    END AS room_status
FROM (
    SELECT 
		ROW_NUMBER() OVER (ORDER BY room.room_id ASC) AS row_num,
        room.room_id,
        room_type.description,
        room_type.price,
        CASE
            WHEN room.room_id > 0
            AND (
                (STR_TO_DATE(checkin, '%Y-%m-%d') >= STR_TO_DATE(booking.checkin_date, '%Y-%m-%d') AND STR_TO_DATE(checkout, '%Y-%m-%d') < STR_TO_DATE(booking.checkin_date, '%Y-%m-%d'))
            OR (STR_TO_DATE(checkin, '%Y-%m-%d') < STR_TO_DATE(booking.checkout_date, '%Y-%m-%d') AND STR_TO_DATE(booking.checkin_date, '%Y-%m-%d') < STR_TO_DATE(checkout, '%Y-%m-%d'))
            )
            THEN 'ไม่ว่าง'
            ELSE 'ว่าง'
        END AS room_status
    FROM room
    JOIN room_type ON room.type_id = room_type.type_id
    LEFT JOIN booking ON room.room_id = booking.room_id
) AS subquery
GROUP BY room_id, description, price;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `find_vacant_room` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `find_vacant_room`()
BEGIN
	select*from vacant_room where room_status = 'ว่าง';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `search_booking_id` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `search_booking_id`(in numberID int)
BEGIN
select
booking.booking_id,
guest.firstname,
guest.lastname,
room_type.description,
(room_type.price*(DATEDIFF(checkout_date, checkin_date))) AS price_total
from booking
join tourist using (tourist_id) 
join guest using (guest_id)
join room using (room_id)
join room_type using (type_id)
where booking_id = numberID;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `search_room` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `search_room`(in checkin date,in checkout date)
BEGIN
SELECT 
    ROW_NUMBER() OVER (ORDER BY room.room_id ASC) AS row_num,
    room.room_id,
    room_type.description,
    room_type.price,
    CASE
        WHEN room.room_id > 0
        AND (
           (STR_TO_DATE(checkin, '%Y-%m-%d') >= STR_TO_DATE(booking.checkin_date, '%Y-%m-%d') AND STR_TO_DATE(checkout, '%Y-%m-%d') < STR_TO_DATE(booking.checkin_date, '%Y-%m-%d'))
            OR (STR_TO_DATE(checkin, '%Y-%m-%d') < STR_TO_DATE(booking.checkout_date, '%Y-%m-%d') AND STR_TO_DATE(booking.checkin_date, '%Y-%m-%d') < STR_TO_DATE(checkout, '%Y-%m-%d'))
        )
        THEN 'ไม่ว่าง'
        ELSE 'ว่าง'
    END AS room_status
FROM room
JOIN room_type ON room.type_id = room_type.type_id
LEFT JOIN booking ON room.room_id = booking.room_id
HAVING room_status = 'ว่าง';
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `tour_commission` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ZERO_IN_DATE,NO_ZERO_DATE,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `tour_commission`(in tour_name varchar(100))
BEGIN
select
row_number() over (order by tourist_id desc) row_num,
booking.tourist_id,
tourist.name,
guest.firstname,
guest.lastname,
room_type.description,
room_type.price,
DATEDIFF(checkout_date, checkin_date) AS number_of_days,
(room_type.price*(DATEDIFF(checkout_date, checkin_date))) AS price_total,
ROUND ((room_type.price*(DATEDIFF(checkout_date, checkin_date)))*7/100,2) AS commission
from booking
join tourist using (tourist_id) 
join guest using (guest_id)
join room using (room_id)
join room_type using (type_id)
where username= tour_name;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-17 23:43:48
