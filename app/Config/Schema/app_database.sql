DROP TABLE IF EXISTS students;
DROP TABLE IF EXISTS subjects;
DROP TABLE IF EXISTS marks;

# Table containing the students
CREATE TABLE students (
  id            INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT, # Identifier of the student
  firstname     VARCHAR(150)         NOT NULL, # The student's firstname
  lastname      VARCHAR(150)         NOT NULL, # The student's lastname
  birthdate     DATE                 NOT NULL, # The student's birth date (YYYY-MM-DD)
  is_registered BOOLEAN              NOT NULL DEFAULT 1, # True if the student is currently registered at school 
  created       DATETIME             NOT NULL, # Creation timestamp
  modified      DATETIME             NOT NULL, # Last modification timestamp
  PRIMARY KEY (id)
);

# Table containing the school subjects
CREATE TABLE subjects (
  id           INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT, # Identifier of the subject
  name         VARCHAR(150)         NOT NULL, # Name of the subject
  is_available BOOLEAN              NOT NULL DEFAULT 1, # True if the subject is still available
  created      DATETIME             NOT NULL, # Creation timestamp
  modified     DATETIME             NOT NULL, # Last modification timestamp
  PRIMARY KEY (id)
);

# Table containing the students' marks for all subjects
CREATE TABLE marks (
  id         INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT, # Identifier of the subject
  student_id INTEGER(10) UNSIGNED NOT NULL, # Identifier of the student
  subject_id INTEGER(10) UNSIGNED NOT NULL, # Identifier of the subject
  mark       INTEGER(2)           NOT NULL DEFAULT 0, # Mark
  is_valid   BOOLEAN              NOT NULL DEFAULT 1, # True if the mark is valid. Can be useful if a teacher wants to keep the record of a mark considered invalid.
  created    DATETIME             NOT NULL, # Creation timestamp
  modified   DATETIME             NOT NULL, # Last modification timestamp
  PRIMARY KEY (id),
  FOREIGN KEY (student_id) REFERENCES students (id),
  FOREIGN KEY (subject_id) REFERENCES subjects (id)
);

