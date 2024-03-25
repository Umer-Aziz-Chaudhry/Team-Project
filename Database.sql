

CREATE TABLE `user` (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255),
    Phone VARCHAR(20),
    Address VARCHAR(255),
    cust_status TINYINT(1) NOT NULL DEFAULT 0 -- 0 for deactive, 1 for active
);

INSERT INTO `user` (FirstName, LastName, Email, Password, Phone, Address, cust_status) VALUES
('John', 'Doe', 'john.doe@example.com', 'password123', '123-456-7890', '123 Main St', 1),
('Jane', 'Smith', 'jane.smith@example.com', 'password234', '987-654-3210', '234 Second St', 1),
('Alice', 'Johnson', 'alice.johnson@example.com', 'password345', '654-321-9876', '345 Third St', 0),
('Bob', 'Williams', 'bob.williams@example.com', 'password456', '321-987-6543', '456 Fourth St', 1),
('Charlie', 'Brown', 'charlie.brown@example.com', 'password567', '132-465-7980', '567 Fifth St', 0),
('Diana', 'Ross', 'diana.ross@example.com', 'password678', '798-132-4651', '678 Sixth St', 1);


CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    product_image VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    company_name VARCHAR(50) NOT NULL,
    description_ TEXT NOT NULL,
    quantity INT NOT NULL,
    active CHAR(3) NOT NULL
);

INSERT INTO products (product_name, price, product_image, category, company_name, description_, quantity, active) VALUES
('IPhone 15 Pro Max', 1199.99, 'media/iphone.jpg', 'Mobiles', 'Apple', 'Experience the cutting-edge technology with the IPhone 15 Pro Max. Boasting a stunning design, a powerful camera system, and top-tier performance, it redefines what a smartphone can do.', 50, 'yes'),
('Nokia G11', 89, 'media/m1.jpg', 'Mobiles', 'Nokia', 'The Nokia G11 offers a budget-friendly option without compromising on performance. With a sleek design and essential features, it''s perfect for everyday use.', 100, 'yes'),
('Pixel 4a', 130, 'media/m2.jpg', 'Mobiles', 'Google', 'Capture life''s moments with the Pixel 4a. This Google smartphone combines impressive camera capabilities with a compact design, providing a seamless user experience.', 75, 'yes'),
('iPhone 12', 349, 'media/m3.jpg', 'Mobiles', 'Apple', 'The iPhone 12 strikes the perfect balance between style and substance. Featuring a Super Retina XDR display, 5G capabilities, and a powerful A14 Bionic chip, it delivers unparalleled performance.', 80, 'yes'),
('Samsung Galaxy S22', 478, 'media/m4.jpg', 'Mobiles', 'Samsung', 'Unleash the power of innovation with the Samsung Galaxy S22. Packed with advanced features, including a high-refresh-rate display, versatile camera system, and robust performance.', 60, 'yes'),
('HUAWEI P20 Pro', 729, 'media/m5.jpg', 'Mobiles', 'Huawei', 'Experience photography like never before with the Huawei P20 Pro. This flagship smartphone boasts a Leica triple camera system and AI capabilities for stunning and intelligent photography.', 40, 'no'),
('Fire Boltt Ninja 2', 60, 'media/p1.jpg', 'Watches', 'Fire Boltt', 'Stay fit and stylish with the Fire Boltt Ninja 2 smartwatch. Track your fitness goals, receive notifications, and enjoy a range of features in a sleek and comfortable design.', 120, 'yes'),
('Noise Pulse Go', 130, 'media/p2.jpg', 'Watches', 'Noise', 'Live an active lifestyle with the Noise Pulse Go smartwatch. It offers fitness tracking, heart rate monitoring, and customizable watch faces, all in a lightweight and stylish package.', 100, 'no'),
('boAt Xtend Pro', 75, 'media/p3.jpg', 'Watches', 'boAt', 'Enhance your daily routine with the boAt Xtend Pro smartwatch. Featuring multiple sports modes, health tracking, and a vibrant display, it''s a perfect companion for your active lifestyle.', 150, 'yes'),
('Lenovo Tab M8', 99, 'media/p4.jpg', 'Tablets', 'Lenovo', 'Immerse yourself in entertainment with the Lenovo Tab M8 tablet. With a sleek design and a vibrant display, it''s perfect for multimedia consumption and on-the-go productivity.', 70, 'yes'),
('Honor PAD X8', 129, 'media/p5.jpg', 'Tablets', 'Honor', 'Unleash productivity with the Honor PAD X8 tablet. Featuring a powerful processor and a high-resolution display, it offers a seamless experience for work and entertainment.', 50, 'yes'),
('IKALL N9', 399, 'media/p6.jpg', 'Tablets', 'IKALL', 'Experience versatility with the IKALL N9 tablet. Whether for work or play, this tablet delivers performance with its large screen, ample storage, and robust features.', 30, 'no'),
('Oppo Pad Air', 199, 'media/p7.jpg', 'Tablets', 'Oppo', 'Stay connected and entertained with the Oppo Pad Air. Slim and lightweight, it combines powerful performance with a stunning display for a delightful tablet experience.', 85, 'yes'),
('Acer EK220Q', 174, 'media/p8.jpg', 'Monitors', 'Acer', 'Immerse yourself in crystal-clear visuals with the Acer EK220Q monitor. Featuring a high-resolution display and slim design, it enhances your computing and entertainment experience.', 90, 'yes'),
('Samsung 24', 179, 'media/p9.jpg', 'Monitors', 'Samsung', 'Elevate your workspace with the Samsung 24 monitor. With vibrant colors, a fast refresh rate, and a sleek design, it delivers a superior visual experience for work and play.', 55, 'no'),
('ZEBRONICS AC32FHD', 129, 'media/p10.jpg', 'Monitors', 'Zebronics', 'Enhance your viewing experience with the ZEBRONICS AC32FHD monitor. Featuring a Full HD display and immersive design, it''s ideal for gaming, entertainment, and productivity.', 75, 'yes'),
('JBL Live Free 2 True', 129.99, 'media/z3.jpg', 'Air Pods', 'JBL', 'True wireless earbuds with high-quality sound and long battery life', 200, 'yes'),
('OnePlus buds Pro 2', 139.99, 'media/z7.webp', 'Air Pods', 'OnePlus', 'Premium wireless earbuds with advanced features and great sound quality', 150, 'yes'),
('Samsung Thunderbolt 3', 299.99, 'media/z1.webp', 'Monitors', 'Samsung', 'High-resolution Thunderbolt 3 monitor for enhanced productivity', 40, 'yes'),
('Sony WF1000XM4 Earbuds', 199.99, 'media/z8.jpg', 'Air Pods', 'Sony', 'Noise-canceling earbuds with exceptional audio performance', 100, 'yes'),
('Beats Fit Pro', 119.99, 'media/z4.jpg', 'Air Pods', 'Beats', 'Fitness-focused wireless earbuds with a secure fit', 130, 'yes'),
('Google-Pixel-Watch', 249.99, 'media/z6.jpg', 'Watches', 'Google', 'Stylish Pixel Watch with advanced smartwatch features', 60, 'yes'),
('Air Pods Pro', 49.99, 'media/airpods.jpeg', 'Air Pods', 'Apple', 'Immerse yourself in premium audio with the Air Pods Pro. Enjoy active noise cancellation, customizable fit, and seamless integration with Apple devices for a truly wireless and immersive listening experience.', 300, 'yes'),
('Apple Watch Series 9', 99.99, 'media/watch.jpg', 'Watches', 'Apple', 'Experience the latest in wearable technology with the Apple Watch Series 9. This stylish and feature-rich smartwatch seamlessly integrates with your daily life, offering fitness tracking, notifications, and more.', 120, 'no'),
('Yoga Smart Tab', 99.99, 'media/z9.jpg', 'Tablets', 'Lenovo', 'Immerse yourself in entertainment with the Lenovo Yoga Smart Tab. With a sleek design and a vibrant display, it''s perfect for multimedia consumption and on-the-go productivity.', 65, 'yes'),
('Samsung Viewfinity S5', 499.99, 'media/z10.jpeg', 'Monitors', 'Samsung', 'Experience the cutting-edge technology with the Samsung Viewfinity S5 tablet. Boasting a sleek design and vibrant display, it offers immersive entertainment and productivity on-the-go.', 20, 'no');

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `cust_id` int(11) NOT NULL,
  `cust_name` varchar(100) NOT NULL,
  `cust_cname` varchar(100) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `cust_phone` varchar(50) NOT NULL,
  `cust_country` int(11) NOT NULL,
  `cust_address` text NOT NULL,
  `cust_city` varchar(100) NOT NULL,
  `cust_state` varchar(100) NOT NULL,
  `cust_zip` varchar(30) NOT NULL,
  `cust_b_name` varchar(100) NOT NULL,
  `cust_b_cname` varchar(100) NOT NULL,
  `cust_b_phone` varchar(50) NOT NULL,
  `cust_b_country` int(11) NOT NULL,
  `cust_b_address` text NOT NULL,
  `cust_b_city` varchar(100) NOT NULL,
  `cust_b_state` varchar(100) NOT NULL,
  `cust_b_zip` varchar(30) NOT NULL,
  `cust_s_name` varchar(100) NOT NULL,
  `cust_s_cname` varchar(100) NOT NULL,
  `cust_s_phone` varchar(50) NOT NULL,
  `cust_s_country` int(11) NOT NULL,
  `cust_s_address` text NOT NULL,
  `cust_s_city` varchar(100) NOT NULL,
  `cust_s_state` varchar(100) NOT NULL,
  `cust_s_zip` varchar(30) NOT NULL,
  `cust_password` varchar(100) NOT NULL,
  `cust_token` varchar(255) NOT NULL,
  `cust_datetime` varchar(100) NOT NULL,
  `cust_timestamp` varchar(100) NOT NULL,
  `cust_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`cust_id`, `cust_name`, `cust_cname`, `cust_email`, `cust_phone`, `cust_country`, `cust_address`, `cust_city`, `cust_state`, `cust_zip`, `cust_b_name`, `cust_b_cname`, `cust_b_phone`, `cust_b_country`, `cust_b_address`, `cust_b_city`, `cust_b_state`, `cust_b_zip`, `cust_s_name`, `cust_s_cname`, `cust_s_phone`, `cust_s_country`, `cust_s_address`, `cust_s_city`, `cust_s_state`, `cust_s_zip`, `cust_password`, `cust_token`, `cust_datetime`, `cust_timestamp`, `cust_status`) VALUES
(1, 'Liam Moore', 'WV Company', 'liam@mail.com', '7458965410', 230, '788 Cottonwood Lane', 'Nashville', 'TN', '37072', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', '0081e99a29cacd4b553db15c5c5c047e', '2022-03-17 11:09:34', '1647544174', 1),
(2, 'Chad N. Carney', 'none', 'chad@mail.com', '4785690000', 230, '469 Diamond Street', 'Charlotte', 'NC', '28808', 'Chad N. Carney', 'none', '7477474440', 230, '469 Diamond Street', 'Charlotte', 'NC', '28808', 'Chad N. Carney', 'none', '7477474440', 230, '469 Diamond Street', 'Charlotte', 'NC', '28808', '5f4dcc3b5aa765d61d8327deb882cf99', 'ca87666426f4bc5c5128a96dabfecefb', '2022-03-17 11:15:26', '1647544526', 1),
(3, 'Jean Collins', 'none', 'jean@mail.com', '1478523698', 230, '1508 Crosswind Drive', 'Owensboro', 'KY', '13040', 'Jean Collins', 'none', '1478523698', 230, '1508 Crosswind Drive', 'Owensboro', 'KY', '13040', 'Jean Collins', 'none', '1478523698', 230, '1508 Crosswind Drive', 'Owensboro', 'KY', '13040', '5f4dcc3b5aa765d61d8327deb882cf99', '6b3439bf95644a36a1ed92bef374ebb7', '2022-03-20 10:29:39', '1647797379', 1),
(4, 'Annie Young', 'XYZ Company', 'annie@mail.com', '7770001144', 230, '79 Burwell Heights Road', 'Beaumont', 'TX', '77400', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'fc8f07537cdd6b3f89eb94f1cad78060', '2022-03-20 10:31:35', '1647797495', 1),
(5, 'Matthew Morales', 'ABC Company', 'matthew@mail.com', '7896587450', 230, '81 Felosa Drive', 'Mira Loma', 'CA', '91002', 'Matthew Morales', 'ABC Company', '7896587450', 230, '81 Felosa Drive', 'Mira Loma', 'CA', '91002', 'Matthew Morales', 'ABC Company', '7896587450', 230, '81 Felosa Drive', 'Mira Loma', 'CA', '91002', '5f4dcc3b5aa765d61d8327deb882cf99', 'c391105908fe01a636bfa5fc39eed33d', '2022-03-20 10:33:15', '1647797595', 1),
(6, 'August F. Freels', 'none', 'august@mail.com', '1478547850', 230, '96 Johnny Lane', 'Milwaukee', 'WI', '55550', 'August F. Freels', 'none', '1478547850', 230, '96 Johnny Lane', 'Milwaukee', 'WI', '55550', 'August F. Freels', 'none', '1478547850', 230, '96 Johnny Lane', 'Milwaukee', 'WI', '55550', '5f4dcc3b5aa765d61d8327deb882cf99', 'decc1fc2c5dd9935df82c0233002ce66', '2022-03-20 10:34:08', '1647797648', 1),
(7, 'Carl M. Dineen', 'none', 'carl@mail.com', '789878987', 230, '77 Lyndon Street', 'Kutztown', 'PA', '19855', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'c79bac688e70cc9665a2164c57ec172c', '2022-03-20 10:35:02', '1647797702', 1),
(8, 'Benjamin B. Louque', 'none', 'benjamin@mail.com', '7777889955', 230, '32 Bridge Street', 'Tulsa', 'OK', '74220', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', '5a0e096368f9669508af7b7203382b07', '2022-03-20 10:36:31', '1647797791', 1),
(9, 'Joe K. Richardson', 'none', 'joe@mail.com', '4444445555', 230, '17 Derek Drive', 'Youngstown', 'OH', '44500', '', '', '', 0, '', '', '', '', '', '', '', 0, '', '', '', '', '5f4dcc3b5aa765d61d8327deb882cf99', 'e74ac0178d7833988d4b1625c42ba26e', '2022-03-20 10:37:18', '1647797838', 1),
(10, 'Will Williams', 'Test Company', 'williams@mail.com', '7410000000', 230, '39 Marcus Street', 'Anniston', 'AL', '37207', 'Will Williams', 'Test Company', '7410000000', 230, '39 Marcus Street', 'Anniston', 'AL', '37207', 'Will Williams', 'Test Company', '7410000000', 230, '39 Marcus Street', 'Anniston', 'AL', '37207', '5f4dcc3b5aa765d61d8327deb882cf99', '941c9265fb920f691cf01b12a15f80f8', '2022-03-20 11:15:59', '1647800159', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer_message`
--

CREATE TABLE `tbl_customer_message` (
  `customer_message_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `order_detail` text NOT NULL,
  `cust_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------




--
-


-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `unit_price` varchar(50) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `product_id`, `product_name`, `size`, `color`, `quantity`, `unit_price`, `payment_id`) VALUES
(1, 83, 'Men\'s Ultra Cotton T-Shirt, Multipack', 'XL', 'Gray', '1', '19', '1647629329'),
(2, 92, 'Travelpro Laptop Carry-on Travel Tote Bag', 'One Size for All', 'Midnight Blue', '1', '91', '1647798593'),
(3, 95, 'Bose QuietComfort 45 Bluetooth Wireless Headphones', 'One Size for All', 'Black', '1', '279', '1647798964'),
(4, 101, 'Digital Infrared Thermometer for Adults and Kids', 'One Size for All', 'White', '1', '70', '1647799174'),
(5, 94, 'WD 5TB Elements Portable External Hard Drive HDD', '5T', 'Black', '1', '149', '1647800902');

-- --------------------------------------------------------


--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `payment_date` varchar(50) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `card_number` varchar(50) NOT NULL,
  `card_cvv` varchar(10) NOT NULL,
  `card_month` varchar(10) NOT NULL,
  `card_year` varchar(10) NOT NULL,
  `bank_transaction_info` text NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `shipping_status` varchar(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `customer_id`, `customer_name`, `customer_email`, `payment_date`, `txnid`, `paid_amount`, `card_number`, `card_cvv`, `card_month`, `card_year`, `bank_transaction_info`, `payment_method`, `payment_status`, `shipping_status`, `payment_id`) VALUES
(51, 2, 'Chad N. Carney', 'chad@mail.com', '2022-03-18 22:48:49', '', 19, '', '', '', '', 'Transaction Id: CA01010158967840\r\nTransaction Date: 3/19/2022\r\nBank: WestView Bank, CA Branch\r\nSender A/C: 102458965WV', 'Bank Deposit', 'Completed', 'Completed', '1647629329'),
(52, 3, 'Jean Collins', 'jean@mail.com', '2022-03-20 10:49:53', '', 91, '', '', '', '', '', 'PayPal', 'Completed', 'Completed', '1647798593'),
(53, 5, 'Matthew Morales', 'matthew@mail.com', '2022-03-20 10:56:04', '', 279, '', '', '', '', 'Transaction Id: CA01101198960040 \r\nTransaction Date: 3/20/2022 \r\nBank: WestView Bank, CA Branch \r\nSender A/C: 109669965WV', 'Bank Deposit', 'Pending', 'Pending', '1647798964'),
(54, 6, 'August F. Freels', 'august@mail.com', '2022-03-20 10:59:34', '', 70, '', '', '', '', 'Transaction Id: CA01101198945600\nTransaction Date: 3/20/2022 \nBank: WestView Bank, CA Branch \nSender A/C: 1100047860WV', 'Bank Deposit', 'Completed', 'Pending', '1647799174'),
(55, 10, 'Will Williams', 'williams@mail.com', '2022-03-20 11:28:22', '', 149, '', '', '', '', 'Transaction Id: CA01003177945009\r\nTransaction Date: 3/20/2022 \r\nBank: WestView Bank, CA Branch \r\nSender A/C: NQ1011050160WV', 'Bank Deposit', 'Completed', 'Completed', '1647800902');

-- --------------------------------------------------------

CREATE TABLE featured_items (
    featured_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

CREATE TABLE most_popular_items (
    popular_id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);
-- Inserting into featured_items
INSERT INTO featured_items (product_id) VALUES
(1), -- IPhone 15 Pro Max
(7), -- Fire Boltt Ninja 2
(10), -- Lenovo Tab M8
(14), -- Acer EK220Q
(17); -- JBL Live Free 2 True

-- Inserting into most_popular_items
INSERT INTO most_popular_items (product_id) VALUES
(5),  -- Samsung Galaxy S22
(22), -- Google-Pixel-Watch
(13), -- Oppo Pad Air
(19), -- Samsung Thunderbolt 3
(23); -- Air Pods Pro


-

-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_customer_message`
--
ALTER TABLE `tbl_customer_message`
  ADD PRIMARY KEY (`customer_message_id`);


-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);


--
-- AUTO_INCREMENT for dumped tables

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_customer_message`
--
ALTER TABLE `tbl_customer_message`
  MODIFY `customer_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--


--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--

--
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
--

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--



ALTER TABLE `tbl_user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_video`
--
