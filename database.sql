DROP DATABASE IF EXISTS bookstore;
CREATE DATABASE bookstore;

CREATE TABLE bookstore.books (
  book_id INT PRIMARY KEY AUTO_INCREMENT,
  title VARCHAR(128) NOT NULL,
  author VARCHAR(48) NOT NULL,
  price DECIMAL(8, 2) NOT NULL,
  filename VARCHAR(64)
);

INSERT INTO bookstore.books (title, author, price, filename) VALUES
("Complete Fairy Tales", "Hans Christian Andersen", 8.99, "fairy-tales.jpg"),
("Faust", "Johann Wolfgang von Goethe", 10.49, "faust.jpg"),
("Great Expectations", "Charles Dickens", 7.99, "great-expectations.jpg"),
("Gulliver's Travels", "Jonathan Swift", 8.49, "gullivers-travels.jpg"),
("Hamlet", "William Shakespeare", 7.49, "hamlet.jpg"),
("History: A Novel", "Elsa Morante", 9.99, "history.jpg"),
("Hunger", "Knut Hamsun", 6.99, "hunger.jpg"),
("Independent People", "Halldor Laxness", 8.99, "independent-people.jpg"),
("Invisible Man", "Ralph Ellison", 7.99, "invisible-man.jpg"),
("King Lear", "William Shakespeare", 8.99, "king-lear.jpg"),
("Leaves of Grass", "Walt Whitman", 8.49, "leaves-of-grass.jpg"),
("Love in the Time of Cholera", "Gabriel Garcia Marquez", 9.49, "love-in-the-time-of-cholera.jpg"),
("Medea", "Euripedes", 6.99, "medea.jpg"),
("Memoirs of Hadrian", "Marguerite Yourcenar", 7.99, "memoirs-of-hadrian.jpg"),
("Middlemarch", "George Eliot", 9.99, "middlemarch.jpg"),
("Midnight's Children", "Salman Rushdie", 10.49, "midnights-children.jpg"),
("Moby Dick", "Herman Melville", 8.49, "moby-dick.jpg"),
("Mrs Dalloway", "Virginia Woolf", 9.99, "mrs-dalloway.jpg"),
("Nineteen Eighty-Four", "George Orwell", 8.99, "nineteen-eighty-four.jpg");

CREATE TABLE bookstore.users (
  user_id INT PRIMARY KEY AUTO_INCREMENT,
  username VARCHAR(32) UNIQUE NOT NULL,
  email VARCHAR(128) NOT NULL,
  password VARCHAR(60) NOT NULL,
  user_role VARCHAR(24) NOT NULL DEFAULT "Member"
);

CREATE TABLE bookstore.postcodes (
  postcode VARCHAR(8) PRIMARY KEY,
  town VARCHAR(32) NOT NULL,
  county VARCHAR(32) NOT NULL
);

CREATE TABLE bookstore.orders (
  order_id INT NOT NULL,
  book_id INT NOT NULL,
  user_id INT NOT NULL,
  quantity INT NOT NULL,
  order_date DATETIME NOT NULL,
  address_line VARCHAR(64) NOT NULL,
  postcode VARCHAR(8) NOT NULL,

  PRIMARY KEY(order_id, book_id, user_id),

  FOREIGN KEY (book_id) REFERENCES books(book_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (postcode) REFERENCES postcodes(postcode)
);