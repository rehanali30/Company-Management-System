CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(50) DEFAULT NULL,
  `AdminuserName` varchar(50) DEFAULT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admin` (`ID`, `AdminName`, `AdminuserName`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 'admin123', '2020-11-28 17:23:17');


CREATE TABLE `emp_detail` (
  `ID` int(11) NOT NULL,
  `EmpFname` varchar(50) DEFAULT NULL,
  `EmpLName` varchar(50) NOT NULL,
  `EmpCode` varchar(50) DEFAULT NULL,
  `EmpDept` varchar(120) DEFAULT NULL,
  `EmpDesignation` varchar(120) DEFAULT NULL,
  `EmpContactNo` bigint(10) DEFAULT NULL,
  `EmpGender` enum('Male','Female') DEFAULT NULL,
  `EmpEmail` varchar(200) DEFAULT NULL,
  `EmpPassword` varchar(100) DEFAULT NULL,
  `EmpJoingdate` date DEFAULT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `emp_reg` ( 
  `EmpID` INT(11) NOT NULL , 
  `EmpFname` VARCHAR(50) NOT NULL , 
  `EmpLname` VARCHAR(50) NOT NULL , 
  `EmpCode` INT(50) NOT NULL , 
  `Reg_Time` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`EmpID`), UNIQUE (`EmpCode`)
  ) ENGINE = InnoDB;

CREATE TRIGGER `reg_timestamp` 
AFTER INSERT ON `emp_detail` 
FOR EACH ROW
INSERT INTO emp_reg VALUES(new.ID, new.EmpFname, new.EmpLName, new.EmpCode, CURRENT_TIMESTAMP());

INSERT INTO `emp_detail` (`ID`, `EmpFname`, `EmpLName`, `EmpCode`, `EmpDept`, `EmpDesignation`, `EmpContactNo`, `EmpGender`, `EmpEmail`, `EmpPassword`, `EmpJoingdate`) VALUES
(1, 'Rehan', 'Ali', '0002', 'Computer', 'Manager', 9999900002, 'Male', 'rehan@email.com', 'rehan', '2020-11-20'),
(2, 'Aftab', 'Ansari', '0004', 'IT', 'Manager', 9999900004, 'Male', 'aftab@email.com', 'aftab', '2020-11-15'),
(3, 'Liza', 'Khan', '0017', 'Computer', 'Employee', 9999900017, 'Female', 'liza@email.com', 'liza', '2020-11-19'),
(4, 'Reshma', 'Khan', '0020', 'Computer', 'Employee', 9999900020, 'Female', 'reshma@email.com', 'reshma', '2020-11-24'),
(5, 'Subhash', 'Pandey', '3465', 'IT', 'Software Developer', 9999567890, 'Male', 'subhash@email.com', 'Test@123', '2019-01-02'),
(6, 'Anuj', 'Kumar', '5580', 'CS', 'Software Developer', 9934567890, 'Male', 'anuj@email.com', '123', '2017-03-23'),
(7, 'Ankush', 'Pandey', '6799', 'IT', 'Software Developer', 9234567890, 'Male', 'ankush@email.com', '89756', '2010-09-13'),
(8, 'Akshat', 'Umang', '2131', 'IT', 'Software Developer', 9994567890, 'Male', 'akshat@email.com', 'Test@123', '2018-10-09'),
(9, 'Aktesh', 'Kumar', '7885', 'IT', 'Software Developer', 9834567890, 'Male', 'aktesh@email.com', 'Test@123', '2019-01-01'),
(10, 'Akshay', 'Kumanth', '9985', 'IT', 'Software Tester', 9800067890, 'Male', 'akshay@email.com', 'akshay', '2019-01-01');

CREATE TABLE `emp_edu` (
  `Id` int(11) NOT NULL,
  `EmpID` int(10) DEFAULT NULL,
  `CoursePG` varchar(45) DEFAULT NULL,
  `SchoolCollegePG` varchar(45) DEFAULT NULL,
  `YearPassingPG` varchar(45) DEFAULT NULL,
  `PercentagePG` varchar(4) DEFAULT NULL,
  `CourseGra` varchar(45) DEFAULT NULL,
  `SchoolCollegeGra` varchar(45) DEFAULT NULL,
  `YearPassingGra` varchar(45) DEFAULT NULL,
  `PercentageGra` varchar(4) DEFAULT NULL,
  `CourseSSC` varchar(45) DEFAULT NULL,
  `SchoolCollegeSSC` varchar(45) DEFAULT NULL,
  `YearPassingSSC` varchar(45) DEFAULT NULL,
  `PercentageSSC` varchar(4) DEFAULT NULL,
  `CourseHSC` varchar(45) DEFAULT NULL,
  `SchoolCollegeHSC` varchar(45) DEFAULT NULL,
  `YearPassingHSC` varchar(45) DEFAULT NULL,
  `PercentageHSC` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `emp_edu` (`Id`, `EmpID`, `CoursePG`, `SchoolCollegePG`, `YearPassingPG`, `PercentagePG`, `CourseGra`, `SchoolCollegeGra`, `YearPassingGra`, `PercentageGra`, `CourseSSC`, `SchoolCollegeSSC`, `YearPassingSSC`, `PercentageSSC`, `CourseHSC`, `SchoolCollegeHSC`, `YearPassingHSC`, `PercentageHSC`) VALUES
(1, 1, 'Computer Science', 'NYU University', '2024', '89%', 'BE Computer', 'Rizvi College', '2022', '95%', 'Science', 'Xaviers School', '2016', '75%', 'Science', 'Xaviers School', '2018', '89%'),
(2, 2, 'IT', 'Barfiwala College', '2024', '92%', 'BE Computer', 'Rizvi College', '2022', '94%', 'Science', 'Barfiwala School', '2016', '95%', 'Science', 'Sacred Hearts School', '2018', '91%'),
(3, 3, 'Computer Science', 'Barfiwala College', '2024', '92%', 'BE Computer', 'Rizvi College', '2022', '94%', 'Science', 'Xaviers School', '2016', '95%', 'Science', 'Sacred Hearts School', '2018', '91%'),
(4, 4, 'IT', 'Barfiwala College', '2024', '92%', 'BE Computer', 'Rizvi College', '2022', '94%', 'Science', 'Barfiwala School', '2016', '95%', 'Science', 'Sacred Hearts School', '2018', '91%'),
(5, 5, 'Digital Marketing', 'Bhavi CA College', '2016', '89%', 'B.Tech(IT)', 'LPU', '2013', '86%', 'Science', 'DPS Senoir School', '2009', '64%', 'Science', 'DPS Senoir School', '2008', '90%'),
(6, 6, 'Master in CA', 'Bhavna CA college', '2004', '89%', 'Bachelor in CA', 'Bhavna CA college', '1996', '95%', 'Science', 'Graimia Convent School', '1993', '75%', 'Science', 'Graimia Convent School', '1991', '89%'),
(7, 7, 'MCA', 'KITE Ghaziabad', '1990', '64%', 'BCA', 'TVN', '1997', '68%', 'Science', 'TVN', '1992', '76%', 'Science', 'TVN', '2010', '89%'),
(8, 8, 'MBA', 'SMU', '2018', '70%', 'B.Tech', 'LPU', '2015', '80%', 'PCM', 'Bhavans School', '2010', '74%', 'PCM', 'Bhavans School', '2008', '85%'),
(9, 9, 'M.Tech', 'AB College', '2014', '65%', 'B.Tech', 'XYZ', '2012', '70%', 'PCM', 'ABC', '2008', '56%', 'Science', 'Bhavans High School', '2006', '85%'),
(10, 10, 'M.Tech', 'AVB College', '2014', '95%', 'B.Tech', 'XYAZ', '2012', '80%', 'PCM', 'ABCD', '2008', '66%', 'Science', 'Bhavans High School', '2006', '85%');


CREATE TABLE `emp_exp` (
  `ID` int(11) NOT NULL,
  `EmpID` int(5) NOT NULL,
  `Employer1Name` varchar(75) DEFAULT NULL,
  `Employer1Designation` varchar(50) DEFAULT NULL,
  `Employer1CTC` varchar(50) DEFAULT NULL,
  `Employer1WorkDuration` varchar(11) DEFAULT NULL,
  `Employer2Name` varchar(75) DEFAULT NULL,
  `Employer2Designation` varchar(50) DEFAULT NULL,
  `Employer2CTC` varchar(50) DEFAULT NULL,
  `Employer2WorkDuration` varchar(11) DEFAULT NULL,
  `Employer3Name` varchar(75) DEFAULT NULL,
  `Employer3Designation` varchar(50) DEFAULT NULL,
  `Employer3CTC` varchar(50) DEFAULT NULL,
  `Employer3WorkDuration` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `emp_exp` (`ID`, `EmpID`, `Employer1Name`, `Employer1Designation`, `Employer1CTC`, `Employer1WorkDuration`, `Employer2Name`, `Employer2Designation`, `Employer2CTC`, `Employer2WorkDuration`, `Employer3Name`, `Employer3Designation`, `Employer3CTC`, `Employer3WorkDuration`) VALUES
(1, 1, 'FAG Pvt. Ltd', 'Computer Manager', '85000 p/m', '5 yrs', 'TYS', 'Computer Manager', '55000 p/m', '6 yrs', 'Hirp Pvt. Ltd', 'Computer Manager', '65000 p/m', '4 yrs'),
(2, 2, 'Deloitte Pvt Ltd', 'IT Manager', '80000 p/m', '4 years', 'Chep India Pvt Ltd', 'IT Manager', '50000 p/m', '3 years', 'Anglo Eastern', 'IT Manager', '70000 p/m', '2 years'),
(3, 3, 'Deloitte Pvt Ltd', 'Employee', '60000 p/m', '4 yrs', 'Chep India Pvt Ltd', 'Employee', '50000 p/m', '3 yrs', 'Hirp Pvt. Ltd', 'Employee', '65000 p/m', '4 yrs'),
(4, 4, 'FAG Pvt. Ltd', 'Employee', '60000 p/m', '4 yrs', 'Chep India Pvt Ltd', 'Employee', '50000 p/m', '3 yrs', 'Anglo Eastern', 'Employee', '65000 p/m', '4 yrs'),
(5, 5, 'Nesco Pvt. Ltd', 'Software Tester', '20000 p/m', '4 yrs', 'TCH Pvt. Ltd', 'Software Tester', '32000 p/m', '4 yrs', 'DFG Pvt. Ltd', 'SR. Software Tester', '45000 p/m', '7 yrs'),
(6, 6, 'Sayo Pvt. Ltd', 'Software Developer', '25000 p/m', '3 yrs', 'AMD Enterprise', 'Software Developer', '30000 p/m', '3 yrs', 'Lakshya Pvt. Ltd', 'Software Developer', '35000 p/m', '2 yrs'),
(7, 7, 'Gorge Pvt. Ltd', 'Accountant', '25000 p/m', '5 yrs', 'HRCH Pvt. Ltd', 'Accountant', '75000 p/m', '5 yrs', 'TCGHB Pvt Ltd', 'Sr.Accountant', '95000 p/m', '8 yrs'),
(8, 8, 'FAG Pvt. Ltd', 'HR Executive', '25000 p/m', '6 yrs', 'TYS', 'HR Executive', '35000 p/m', '7 yrs', 'HIRP Pvt. Ltd', 'HR Executive', '45000 p/m', '4 yrs'),
(9, 9, 'AVC Tech', 'Accountant', '25000 p/m', '1 yrs', 'ABP Pvt. Ltd', 'Accountant', '30000 p/m', '3 yrs', 'Tech Pvt. Ltd', 'Accountant', '45000 p/m', '5 yrs'),
(10, 10, 'AVJ Tech', 'Tester', '25000 p/m', '1 yrs', 'ACP Pvt. Ltd', 'Tester', '30000 p/m', '3 yrs', 'Tech Pvt. Ltd', 'Tester', '45000 p/m', '5 yrs');


ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `emp_detail`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `EmpCode` (`EmpCode`);


ALTER TABLE `emp_edu`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `EmpID` (`EmpID`);


ALTER TABLE `emp_exp`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `EmpID` (`EmpID`);


ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `emp_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `emp_edu`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `emp_exp`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;


ALTER TABLE `emp_edu`
  ADD CONSTRAINT `emp_edu_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `emp_detail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;


ALTER TABLE `emp_exp`
  ADD CONSTRAINT `emp_exp_ibfk_1` FOREIGN KEY (`EmpID`) REFERENCES `emp_detail` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
