-- Create User table
CREATE TABLE user (
    UserID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255),
    Phone VARCHAR(20)
);

-- Create the products table
CREATE TABLE products (
    ProductID INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    product_image VARCHAR(255) NOT NULL,
    category VARCHAR(50) NOT NULL,
    company_name VARCHAR(255) NOT NULL,
    description_ TEXT
);



-- Create Order table
CREATE TABLE OrderTable (
    OrderID INT PRIMARY KEY,
    UserID INT,
    OrderDate DATE,
    TotalAmount DECIMAL(10, 2),
    FOREIGN KEY (UserID) REFERENCES User(UserID)
);

-- Create OrderItem table
CREATE TABLE OrderItem (
    OrderItemID INT PRIMARY KEY,
    OrderID INT,
    ProductID INT,
    Quantity INT,
    Subtotal DECIMAL(10, 2),
    FOREIGN KEY (OrderID) REFERENCES OrderTable(OrderID),
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);

-- Create Transaction table
CREATE TABLE Transaction (
    TransactionID INT PRIMARY KEY,
    OrderID INT,
    TransactionDate DATE,
    PaymentMethod VARCHAR(50),
    Amount DECIMAL(10, 2),
    FOREIGN KEY (OrderID) REFERENCES OrderTable(OrderID)
);

-- Create ProductHistory table
CREATE TABLE ProductHistory (
    ProductHistoryID INT PRIMARY KEY,
    ProductID INT,
    ChangeDate DATE,
    OldPrice DECIMAL(10, 2),
    NewPrice DECIMAL(10, 2),
    StockChange INT,
    Reason VARCHAR(255),
    FOREIGN KEY (ProductID) REFERENCES Product(ProductID)
);




INSERT INTO products (product_name, price, product_image, category, company_name, description_) VALUES
    ('IPhone 15 Pro Max', 1199.99, 'media/iphone.jpg', 'Mobiles', 'Apple', 'Experience the cutting-edge technology with the IPhone 15 Pro Max. Boasting a stunning design, a powerful camera system, and top-tier performance, it redefines what a smartphone can do.'),
    ('Nokia G11', 89, 'media/m1.jpg', 'Mobiles', 'Nokia', 'The Nokia G11 offers a budget-friendly option without compromising on performance. With a sleek design and essential features, it''s perfect for everyday use.'),
    ('Pixel 4a', 130, 'media/m2.jpg', 'Mobiles', 'Google', 'Capture life''s moments with the Pixel 4a. This Google smartphone combines impressive camera capabilities with a compact design, providing a seamless user experience.'),
    ('iPhone 12', 349, 'media/m3.jpg', 'Mobiles', 'Apple', 'The iPhone 12 strikes the perfect balance between style and substance. Featuring a Super Retina XDR display, 5G capabilities, and a powerful A14 Bionic chip, it delivers unparalleled performance.'),
    ('Samsung Galaxy S22', 478, 'media/m4.jpg', 'Mobiles', 'Samsung', 'Unleash the power of innovation with the Samsung Galaxy S22. Packed with advanced features, including a high-refresh-rate display, versatile camera system, and robust performance.'),
    ('HUAWEI P20 Pro', 729, 'media/m5.jpg', 'Mobiles', 'Huawei', 'Experience photography like never before with the Huawei P20 Pro. This flagship smartphone boasts a Leica triple camera system and AI capabilities for stunning and intelligent photography.'),
    ('Fire Boltt Ninja 2', 60, 'media/p1.jpg', 'Watches', 'Fire Boltt', 'Stay fit and stylish with the Fire Boltt Ninja 2 smartwatch. Track your fitness goals, receive notifications, and enjoy a range of features in a sleek and comfortable design.'),
    ('Noise Pulse Go', 130, 'media/p2.jpg', 'Watches', 'Noise', 'Live an active lifestyle with the Noise Pulse Go smartwatch. It offers fitness tracking, heart rate monitoring, and customizable watch faces, all in a lightweight and stylish package.'),
    ('boAt Xtend Pro', 75, 'media/m3.jpg', 'Watches', 'boAt', 'Enhance your daily routine with the boAt Xtend Pro smartwatch. Featuring multiple sports modes, health tracking, and a vibrant display, it''s a perfect companion for your active lifestyle.'),
    ('Lenovo Tab M8', 99, 'media/p4.jpg', 'Tablets', 'Lenovo', 'Immerse yourself in entertainment with the Lenovo Tab M8 tablet. With a sleek design and a vibrant display, it''s perfect for multimedia consumption and on-the-go productivity.'),
    ('Honor PAD X8', 129, 'media/p5.jpg', 'Tablets', 'Honor', 'Unleash productivity with the Honor PAD X8 tablet. Featuring a powerful processor and a high-resolution display, it offers a seamless experience for work and entertainment.'),
    ('IKALL N9', 399, 'media/p6.jpg', 'Tablets', 'IKALL', 'Experience versatility with the IKALL N9 tablet. Whether for work or play, this tablet delivers performance with its large screen, ample storage, and robust features.'),
    ('Oppo Pad Air', 199, 'media/p7.jpg', 'Tablets', 'Oppo', 'Stay connected and entertained with the Oppo Pad Air. Slim and lightweight, it combines powerful performance with a stunning display for a delightful tablet experience.'),
    ('Acer EK220Q', 174, 'media/p8.jpg', 'Monitors', 'Acer', 'Immerse yourself in crystal-clear visuals with the Acer EK220Q monitor. Featuring a high-resolution display and slim design, it enhances your computing and entertainment experience.'),
    ('Samsung 24', 179, 'media/p9.jpg', 'Monitors', 'Samsung', 'Elevate your workspace with the Samsung 24 monitor. With vibrant colors, a fast refresh rate, and a sleek design, it delivers a superior visual experience for work and play.'),
    ('ZEBRONICS AC32FHD', 129, 'media/p10.jpg', 'Monitors', 'Zebronics', 'Enhance your viewing experience with the ZEBRONICS AC32FHD monitor. Featuring a Full HD display and immersive design, it''s ideal for gaming, entertainment, and productivity.'),
    ('JBL Live Free 2 True', 129.99, 'media/z3.jpg', 'Air Pods', 'JBL', 'True wireless earbuds with high-quality sound and long battery life'),
    ('OnePlus buds Pro 2', 139.99, 'media/z7.webp', 'Air Pods', 'OnePlus', 'Premium wireless earbuds with advanced features and great sound quality'),
    ('Samsung Thunderbolt 3', 299.99, 'media/z1.webp', 'Monitors', 'Samsung', 'High-resolution Thunderbolt 3 monitor for enhanced productivity'),
    ('Sony WF1000XM4 Earbuds', 199.99, 'media/z8.jpg', 'Air Pods', 'Sony', 'Noise-canceling earbuds with exceptional audio performance'),
    ('Beats Fit Pro', 119.99, 'media/z4.jpg', 'Air Pods', 'Beats', 'Fitness-focused wireless earbuds with a secure fit'),
    ('Google-Pixel-Watch', 249.99, 'media/z6.jpg', 'Watches', 'Google', 'Stylish Pixel Watch with advanced smartwatch features');
    ('Air Pods Pro', 49.99, 'media/airpods.jpeg', 'Air Pods', 'Apple', 'Immerse yourself in premium audio with the Air Pods Pro. Enjoy active noise cancellation, customizable fit, and seamless integration with Apple devices for a truly wireless and immersive listening experience.');

INSERT INTO products (product_name, price, product_image, category, company_name, description_) VALUES
    ('Apple Watch Series 9', 99.99, 'media/watch.jpg', 'Watches', 'Apple', 'Experience the latest in wearable technology with the Apple Watch Series 9. This stylish and feature-rich smartwatch seamlessly integrates with your daily life, offering fitness tracking, notifications, and more.');

INSERT INTO products (product_name, price, product_image, category, company_name, description_) VALUES
    ('Yoga Smart Tab', 99.99, 'media/z9.jpg', 'Tablets', 'Lenovo', 'Immerse yourself in entertainment with the Lenovo Yoga Smart Tab. With a sleek design and a vibrant display, it''s perfect for multimedia consumption and on-the-go productivity.');

INSERT INTO products (product_name, price, product_image, category, company_name, description_) VALUES
    ('Samsung Viewfinity S5', 499.99, 'media/z10.jpeg', 'Tablets', 'Lenovo', 'Immerse yourself in entertainment with the Lenovo Yoga Smart Tab. With a sleek design and a vibrant display, it''s perfect for multimedia consumption and on-the-go productivity.');


INSERT INTO products (product_name, price, product_image, category, company_name, description_) VALUES
    ('Samsung Viewfinity S5', 499.99, 'media/z10.jpeg', 'Monitors', 'Samsung', 'Experience the cutting-edge technology with the Samsung Viewfinity S5 tablet. Boasting a sleek design and vibrant display, it offers immersive entertainment and productivity on-the-go.');