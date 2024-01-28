DROP DATABASE IF EXISTS pets;
CREATE DATABASE pets;

CREATE TABLE pets.petsinfo (
  pet_id INT PRIMARY KEY AUTO_INCREMENT,
  name_ VARCHAR(128) NOT NULL,
  species VARCHAR(48) NOT NULL,
  age int NOT NULL,
  filename VARCHAR(64)
);

INSERT INTO pets.petsinfo (name_, species, age, filename) VALUES
("Alfred", "Dog", 5, "alfred.jpg"),
("Rose", "Dog", 3, "rose.jpg"),
("Charlie", "Dog", 4, "charlie.jpg"),
("Rose's Travels", "Dog", 6, "rose.jpg"),
("Charlie", "Dog", 8, "charlie.jpg"),
("Duke", "Dog", 9, "duke.jpg"),
("Bella", "Dog", 5, "bella.jpg"),
("Bear", "Dog", 10, "bear.jpg"),
("Milo", "Dog", 7, "milo.jpg"),
("Leo", "Dog", 8, "leo.jpg"),
("Rocky", "Dog", 11, "rocky.jpg"),
("Bruno", "Dog", 6, "bruno.jpg"),
("Max", "Dog", 9, "max.jpg"),
("Sadie", "Dog", 12, "sadie.jpg"),
("Lucy", "Dog", 10, "lucy.jpg"),
("Cleo", "Cat", 13, "cleo.jpg"),
("Oliver", "Cat", 3, "oliver.jpg"),
("Luna", "Cat", 4, "luna.jpg"),
("Whiskers", "Cat", 3, "whiskers.jpg");

CREATE TABLE pets.users (
  user_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(32) UNIQUE NOT NULL,
  email VARCHAR(128) NOT NULL,
  password VARCHAR(60) NOT NULL,
  user_role VARCHAR(24) NOT NULL DEFAULT "Member"
);

CREATE TABLE pets.postcodes (
  postcode VARCHAR(8) PRIMARY KEY,
  town VARCHAR(32) NOT NULL,
  county VARCHAR(32) NOT NULL
);

CREATE TABLE pets.orders (
  order_id INT NOT NULL,
  book_id INT NOT NULL,
  user_id INT NOT NULL,
  quantity INT NOT NULL,
  order_date DATETIME NOT NULL,
  address_line VARCHAR(64) NOT NULL,
  postcode VARCHAR(8) NOT NULL,

  PRIMARY KEY(order_id, book_id, user_id),

  FOREIGN KEY (book_id) REFERENCES petsinfo(pet_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (postcode) REFERENCES postcodes(postcode)
);