CREATE TABLE `persons` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `birth_date` date NOT NULL,
  `mobile_num` varchar(20) NOT NULL DEFAULT 'N/A',
  `house_num` varchar(20) NOT NULL DEFAULT 'N/A',
  `work_num` varchar(20) NOT NULL DEFAULT 'N/A',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
);

INSERT INTO `persons` (`id`, `first_name`, `last_name`, `birth_date`, `mobile_num`, `house_num`, `work_num`) VALUES
(1, 'Ben', 'Kenobi', '1920-04-14', '(21) 4762-6714', '(21) 2239-0160', '(21) 3251-2247'),
(2, 'Luke', 'Skywalker', '1958-05-19', '(21) 9352-7640', '(21) 2266-7027', '(21) 3251-2247'),
(3, 'Han', 'Solo', '1945-07-13', '(21) 5180-5889', '(21) 2266-0168', '(21) 3251-2247'),
(4, 'Leia', 'Organa', '1958-05-19', '(21) 7601-7646', '(21) 2266-0168', '(21) 3251-2247');