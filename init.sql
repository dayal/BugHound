DROP DATABASE IF EXISTS bug_hound;

CREATE DATABASE bug_hound;

use bug_hound;

DROP TABLE IF EXISTS program;

DROP TABLE IF EXISTS area;

DROP TABLE IF EXISTS bug_report;

DROP TABLE IF EXISTS employee;

CREATE TABLE program (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    rel INT NOT NULL,
    version INT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT unique_program UNIQUE (name, rel, version)
);

CREATE TABLE area (
    id INT NOT NULL AUTO_INCREMENT,
    program_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (program_id) REFERENCES program (id),
    CONSTRAINT unique_program UNIQUE (name)
);

CREATE TABLE employee (
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    is_admin BOOLEAN NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    UNIQUE (username)
);

CREATE TABLE bug_report (
    id INT NOT NULL AUTO_INCREMENT,
    program_id INT NOT NULL,
    reported_by_id INT NOT NULL,
    assigned_to_id INT NULL,
    resolved_by_id INT NULL,
    report_type VARCHAR(100) NOT NULL,
    severity VARCHAR(100) NOT NULL,
    status VARCHAR(100),
    priority VARCHAR(100),
    resolution VARCHAR(100),
    report_date DATE NOT NULL,
    summary VARCHAR(1000) NOT NULL,
    problem VARCHAR(1000) NOT NULL,
    suggested_fix VARCHAR(1000),
    comments VARCHAR(1000),
    resolution_version VARCHAR(100),
    area VARCHAR(100),
    is_reproducible BOOLEAN DEFAULT 0 NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (program_id) REFERENCES program (id),
    FOREIGN KEY (reported_by_id) REFERENCES employee (id),
    FOREIGN KEY (assigned_to_id) REFERENCES employee (id),
    FOREIGN KEY (resolved_by_id) REFERENCES employee (id)
);

INSERT INTO employee (username, password, name, is_admin)
    VALUES ('admin', 'admin', 'Admin', 1);