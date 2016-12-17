 CREATE TABLE `users` 
 ( `id` int(11) NOT NULL, 
 	`perfil` varchar(30) COLLATE utf8_spanish_ci NOT NULL, 
 	`username` varchar(100) COLLATE utf8_spanish_ci NOT NULL, 
 	`password` varchar(100) COLLATE utf8_spanish_ci NOT NULL ) 
 ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci; 
 ALTER TABLE `users`  ADD PRIMARY KEY (`id`); 
 ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;