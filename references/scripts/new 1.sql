CREATE DATABASE GoToGroDatabase;
USE GoToGroDatabase;
CREATE TABLE Address (
	`AddressID` int AUTO_INCREMENT NOT NULL,
	`StreetAddress` varchar(30) NOT NULL,
	`Suburb` varchar(30) NOT NULL,
	`Postcode` char(4) NOT NULL,
	`State` char(3) NOT NULL,
	primary key(`AddressID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE Staff (
	`StaffID` int AUTO_INCREMENT NOT NULL,
	`FirstName` varchar(30) NOT NULL,
	`MiddleName` varchar(30) NOT NULL,
	`LastName` varchar(30) NOT NULL,
	`DateofBirth` date NOT NULL,
	`AddressID` int NOT NULL,
	`StaffAcID` int NOT NULL,
	`Password` varchar(30) NOT NULL,
	primary key(`StaffID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE
	Staff
ADD
	CONSTRAINT address_address_ID FOREIGN KEY (AddressID) REFERENCES Address (AddressID);

CREATE TABLE Staff_Accountability (
	`StaffAcID` int AUTO_INCREMENT NOT NULL,
	`StaffID` int NOT NULL,
	`Date` datetime NOT NULL,
	primary key(`StaffAcID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE
	Staff
ADD
	CONSTRAINT staff_access_id FOREIGN KEY (StaffAcID) REFERENCES Staff_Accountability (StaffAcID);

CREATE TABLE Member (
	`MemberID` int AUTO_INCREMENT NOT NULL,
	`FirstName` varchar(30) NOT NULL,
	`MiddleName` varchar(30) NOT NULL,
	`LastName` varchar(30) NOT NULL,
	`DateofBirth` date NOT NULL,
	`AddressID` int NOT NULL,
	`StaffAcID` int NOT NULL,
	primary key(`MemberID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE
	Member
ADD
	CONSTRAINT member_access_id FOREIGN KEY (StaffAcID) REFERENCES Staff_Accountability (StaffAcID);

CREATE TABLE Sale (
	`SaleID` int AUTO_INCREMENT NOT NULL,
	`MemberID` int NOT NULL,
	`Date` date NOT NULL,
	`StaffAcID` int NOT NULL,
	primary key(`SaleID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE
	Sale
ADD
	CONSTRAINT member_sale_id FOREIGN KEY (MemberID) REFERENCES Member (MemberID);

ALTER TABLE
	Sale
ADD
	CONSTRAINT staff_sale_access_id FOREIGN KEY (StaffAcID) REFERENCES Staff_Accountability (StaffAcID);

CREATE TABLE Sale_Line (
	`SaleID` int AUTO_INCREMENT NOT NULL,
	`LineNumber` int NOT NULL,
	`ProductID` int NOT NULL,
	`Quantity` int NOT NULL,
	primary key(`SaleID`, `LineNumber`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE Product (
	`ProductID` int AUTO_INCREMENT NOT NULL,
	`Name` varchar(30) NOT NULL,
	`Supplier` varchar(30) NOT NULL,
	`Price` float NOT NULL,
	`Description` text NOT NULL,
	`StaffAcID` int NOT NULL,
	primary key(`ProductID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE
	Sale_Line
ADD
	CONSTRAINT product_sale_id FOREIGN KEY (ProductID) REFERENCES Product (ProductID);

ALTER TABLE
	Product
ADD
	CONSTRAINT staff_new_access_id FOREIGN KEY (StaffAcID) REFERENCES Staff_Accountability (StaffAcID);

CREATE TABLE Role (
	`RoleID` int(11) NOT NULL,
	`RoleName` varchar(50) DEFAULT NULL,
	`Description` varchar(255) DEFAULT NULL,
	primary key (`RoleID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE Staff_roles (
	`StaffID` int(11) NOT NULL,
	`RoleID` int(11) NOT NULL, 
	primary key(`StaffID`, `RoleID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE
	Staff_roles
ADD
	CONSTRAINT staff_roles_id FOREIGN KEY (StaffID) REFERENCES Staff (StaffID);

ALTER TABLE
	Staff_roles
ADD
	CONSTRAINT staff_roles_roles_id FOREIGN KEY (RoleID) REFERENCES Role (RoleID);