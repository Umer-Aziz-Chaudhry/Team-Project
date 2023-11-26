-- Create User table
CREATE TABLE User (
    UserID INT PRIMARY KEY,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    Email VARCHAR(255) UNIQUE,
    Password VARCHAR(255),
    Address VARCHAR(255),
    Phone VARCHAR(20)
);

-- Create Product table
CREATE TABLE Product (
    ProductID INT PRIMARY KEY,
    Name VARCHAR(255),
    Description TEXT,
    Price DECIMAL(10, 2),
    StockQuantity INT,
    Brand VARCHAR(255),
    Category VARCHAR(50),
    Specifications JSON -- or create a separate table for specifications
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
