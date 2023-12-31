CREATE DATABASE GoToGroDatabase;

USE GoToGroDatabase;

CREATE TABLE Staff (
	`StaffID` int AUTO_INCREMENT NOT NULL,
	`FirstName` varchar(30) NOT NULL,
	`MiddleName` varchar(30) NOT NULL,
	`LastName` varchar(30) NOT NULL,
	`DateofBirth` date NOT NULL,
	`Address` text NOT NULL,
	`Password` varchar(30) NOT NULL,
	primary key(`StaffID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE Member (
	`MemberID` int AUTO_INCREMENT NOT NULL,
	`FirstName` varchar(30) NOT NULL,
	`MiddleName` varchar(30) NOT NULL,
	`LastName` varchar(30) NOT NULL,
	`DateofBirth` date NOT NULL,
	`Address` text NOT NULL,
	primary key(`MemberID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE Sale (
	`SaleID` int AUTO_INCREMENT NOT NULL,
	`MemberID` int NOT NULL,
	`Date` date NOT NULL,
	primary key(`SaleID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE
	Sale
ADD
	CONSTRAINT member_sale_id FOREIGN KEY (MemberID) REFERENCES Member (MemberID);

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
	primary key(`ProductID`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

ALTER TABLE
	Sale_Line
ADD
	CONSTRAINT product_sale_id FOREIGN KEY (ProductID) REFERENCES Product (ProductID);

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

ALTER TABLE
	`staff`
ADD
	`Email` VARCHAR(50) NULL DEFAULT NULL;

ALTER TABLE
	`member`
ADD
	`Email` VARCHAR(50) NULL DEFAULT NULL;

ALTER TABLE
	`staff` CHANGE `Password` `Password` VARCHAR(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL;

INSERT INTO
	`role` (`RoleID`, `RoleName`, `Description`)
VALUES
	('1', 'Admin', 'Admin Description'),
	('2', 'Staff', 'Staff Description');

INSERT INTO
	`staff` (
		`StaffID`,
		`FirstName`,
		`MiddleName`,
		`LastName`,
		`DateofBirth`,
		`Address`,
		`Password`,
		`Email`
	)
VALUES
	(
		NULL,
		'Admin fName',
		'Admin mName',
		'Admin lName',
		'1995-01-01',
		'Address text',
		'123456pass',
		'admin@gotogro.com.au'
	);