-- CREATE DATABASE codechallenges

USE codechallenges;

CREATE TABLE department
(
    id INT PRIMARY KEY NOT NULL,
    name VARCHAR(45) NOT NULL
);

CREATE TABLE medical_journal
(
    id INT PRIMARY KEY NOT NULL,
    name VARCHAR(100),
    socialSecurityNumber INT
);

CREATE TABLE docter
(
    id INT PRIMARY KEY NOT NULL,
    name VARCHAR(100),
    department INT NOT NULL,
    FOREIGN KEY (department) REFERENCES department(id)
);

CREATE TABLE admission
(
    id INT PRIMARY KEY NOT NULL,
    medicalJournal INT NOT NULL,
    department INT NOT NULL,
    FOREIGN KEY (medicalJournal) REFERENCES medical_journal(id),
    FOREIGN KEY (department) REFERENCES department(id)
);

CREATE TABLE docter_has_admission
(
    docterId INT NOT NULL,
    admissionId INT NOT NULL,
    PRIMARY KEY (docterId, admissionId),
    FOREIGN KEY (docterId) REFERENCES docter(id),
    FOREIGN KEY (admissionId) REFERENCES admission(id)
);