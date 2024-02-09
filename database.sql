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

CREATE TABLE pets.petstories (
  story_id INT PRIMARY KEY AUTO_INCREMENT,
  pet_id INT,
  story_text TEXT NOT NULL,
  FOREIGN KEY (pet_id) REFERENCES pets.petsinfo (pet_id)
);

INSERT INTO petstories (pet_id, story_text) VALUES
 (1, 'Meet Alfred, the Great Dane. With his towering stature and gentle nature, Alfred was a giant among dogs. He had a heart as big as his size, and his breed''s reputation for being gentle giants held true in his case. Alfred''s favorite pastime was strolling through the park, where he often became the center of attention. Children would giggle in amazement at the sight of this lovable giant, while adults admired his majestic presence. One sunny afternoon, as Alfred basked in the warmth of the sun, a friendly squirrel scampered down from a nearby tree. With curiosity in his eyes, Alfred watched the little creature dart about, his tail wagging with excitement. Though his breed was known for its impressive size, Alfred had a gentle and playful spirit that endeared him to all. As the day drew to a close, Alfred and his owner headed home, their hearts full of the shared joy and laughter of their time together. It was just another day in the life of Alfred, the Great Dane, a dog whose love and gentleness were as boundless as his size.'),
 (2, "Introducing Rose, the Dachshund, a charming little dog with a heart full of love and a world of loyalty to offer. If you're looking for a furry friend to brighten your days, Rose might be your perfect match. Rose is a sweet Dachshund with a delightful personality. Her unique appearance and loving nature make her an irresistible addition to any family. At just the right size, she's the ideal companion for both cozy cuddles and outdoor adventures. Rose dreams of finding a forever home where she can share her love and joy. Whether it's snuggling on the couch, going for leisurely walks, or enjoying playtime in the yard, Rose is up for any adventure, as long as it's with you. If you're ready to open your heart and home to Rose, the Dachshund, visit our adoption center today. Rose is waiting with wagging tails and a heart full of love just for you. Don't miss the chance to make Rose a part of your family. Contact us now and start your journey toward a lifetime of happiness with your new best friend, Rose!"),
 (3, "Introducing Charlie, a bright-eyed Doberman Pinscher puppy with a spirit as adventurous as the day is long. If you're seeking a loyal companion and a bundle of joy, Charlie might be the furry friend you've been searching for. Charlie is a charming Doberman Pinscher puppy who's ready to steal your heart. With a sleek coat and an eager personality, he's the epitome of puppy cuteness. His floppy ears and boundless energy make every day with Charlie an exciting adventure. Charlie is on a mission to find his forever home—a place where he can grow, play, and be loved unconditionally. He's eager to join a family that will cherish his loyalty and enjoy his playful antics. Charlie's youthful spirit is contagious, and he's guaranteed to fill your home with love and laughter. Charlie is eagerly waiting to become a part of your life. If you're ready to open your heart and home to this delightful Doberman Pinscher puppy, visit our adoption center today. Charlie is looking forward to wagging his tail and sharing his love with you."),
 (4, "Introducing Rose, the Dachshund, a charming little dog with a heart full of love and a world of loyalty to offer. If you're looking for a furry friend to brighten your days, Rose might be your perfect match. Rose is a sweet Dachshund with a delightful personality. Her unique appearance and loving nature make her an irresistible addition to any family. At just the right size, she's the ideal companion for both cozy cuddles and outdoor adventures. Rose dreams of finding a forever home where she can share her love and joy. Whether it's snuggling on the couch, going for leisurely walks, or enjoying playtime in the yard, Rose is up for any adventure, as long as it's with you. If you're ready to open your heart and home to Rose, the Dachshund, visit our adoption center today. Rose is waiting with wagging tails and a heart full of love just for you. Don't miss the chance to make Rose a part of your family. Contact us now and start your journey toward a lifetime of happiness with your new best friend, Rose!"),
 (5, "Introducing Charlie, a bright-eyed Doberman Pinscher puppy with a spirit as adventurous as the day is long. If you're seeking a loyal companion and a bundle of joy, Charlie might be the furry friend you've been searching for. Charlie is a charming Doberman Pinscher puppy who's ready to steal your heart. With a sleek coat and an eager personality, he's the epitome of puppy cuteness. His floppy ears and boundless energy make every day with Charlie an exciting adventure. Charlie is on a mission to find his forever home—a place where he can grow, play, and be loved unconditionally. He's eager to join a family that will cherish his loyalty and enjoy his playful antics. Charlie's youthful spirit is contagious, and he's guaranteed to fill your home with love and laughter. Charlie is eagerly waiting to become a part of your life. If you're ready to open your heart and home to this delightful Doberman Pinscher puppy, visit our adoption center today. Charlie is looking forward to wagging his tail and sharing his love with you."),
 (6, "Introducing Duke, an enchanting Miniature Poodle with a heart full of love and a desire to be your faithful companion. If you're in search of a furry friend to brighten your life, Duke may be the perfect match. Duke is a charming Miniature Poodle who embodies elegance and grace. With his curly coat and soulful eyes, he's a little bundle of joy. Duke's intelligence and gentle nature make him the ideal companion for those seeking a loving and devoted friend. Duke dreams of finding his forever home—a place where he can shower you with affection and warmth. Whether it's cuddling on the couch, going for leisurely strolls in the park, or simply being by your side, Duke is ready to be your loyal partner in every adventure. If you're ready to welcome Duke into your heart and home, visit our adoption center today. Duke is waiting with open paws and a heart full of love just for you. Don't miss the chance to make Duke a cherished part of your family. Contact us now to begin your journey towards a lifetime of happiness with your new best friend, Duke!"),
 (7, "Introducing Bella, an enchanting Shih Tzu with a heart as warm as her fluffy coat. If you're seeking a loyal and loving companion, Bella might just be the furry friend you've been looking for. Bella is a delightful Shih Tzu who will steal your heart with one wag of her tail. With her soft, silky fur and endearing personality, she's the epitome of canine charm. Bella's gentle nature and affectionate demeanor make her the perfect choice for those in search of a faithful and furry friend. Bella dreams of finding her forever home—a place where she can bring joy and companionship to your life. Whether it's cuddling on the couch, taking leisurely walks through the neighborhood, or simply being your constant companion, Bella is ready to fill your days with love. If you're ready to open your heart and home to Bella, visit our adoption center today. Bella is waiting with open arms (and a wagging tail) to become a cherished member of your family. "),
 (8, "Introducing Bear, an energetic and lovable Boxer with a heart as big as his spirit. If you're looking for a furry friend who's always up for adventure, Bear might be the perfect addition to your family. Bear is a handsome Boxer with an irresistible charm and boundless enthusiasm. His strong build and joyful personality make him a true canine athlete. Bear's zest for life and affectionate nature make him the ideal companion for those seeking an active and loyal friend. Bear is on a mission to find his forever home—a place where he can share his love and energy. Whether it's running around in the backyard, going for hikes in the great outdoors, or just lounging on the couch with you, Bear is ready to be your constant companion. If you're ready to open your heart and home to Bear, visit our adoption center today. Bear is eagerly waiting to become a cherished member of your family, and he can't wait to bring joy and excitement to your life. "),
 (9, "Introducing Milo, a majestic White Swiss Shepherd with a heart as pure as his coat. If you're searching for a loyal and loving companion with grace and beauty, Milo could be the perfect addition to your family. Milo is a stunning White Swiss Shepherd known for his elegance and gentle demeanor. His pristine white fur and soulful eyes make him an enchanting presence. Milo's intelligence and devotion to his humans make him the perfect choice for those seeking a loyal and noble friend. Milo dreams of finding his forever home—a place where he can be your steadfast guardian and devoted friend. Whether it's going for peaceful walks in the countryside, curling up with you by the fireplace, or simply being your loyal companion, Milo is ready to fill your life with love. If you're ready to open your heart and home to Milo, visit our adoption center today. Milo is patiently waiting to become an integral part of your family, and he's eager to offer his unwavering loyalty and love."),
 (10, "Introducing Leo, an adorable French Bulldog with a heart full of love and a charming personality. If you're seeking a furry friend who's both loyal and full of character, Leo could be the perfect addition to your life. Leo is a lovable French Bulldog known for his unique looks and affectionate nature. With his expressive eyes and signature bat-like ears, he's sure to capture your heart. Leo's playful spirit and devotion to his humans make him the ideal choice for those seeking a loyal and endearing companion.  Leo is on a quest to find his forever home—a place where he can bring joy, laughter, and love into your life. Whether it's lounging on the couch, going for leisurely strolls, or simply being your constant companion, Leo is ready to be your loyal sidekick. If you're ready to open your heart and home to Leo, visit our adoption center today. Leo is eagerly waiting to become a cherished member of your family and is excited to share his love and companionship."),
 (11, "Introducing Rocky, an energetic and intelligent Australian Shepherd with a heart full of adventure. If you're searching for a loyal and playful companion, Rocky might be the perfect match for your active lifestyle. Rocky is a striking Australian Shepherd known for his stunning coat and boundless enthusiasm. His striking blue eyes and agile nature make him a true standout. Rocky's intelligence and eagerness to please his humans make him an ideal choice for those seeking a devoted and adventurous friend. Rocky is on a mission to find his forever home—a place where he can be your constant companion in all your adventures. Whether it's hiking through the wilderness, playing fetch at the park, or simply sharing quiet moments with you, Rocky is ready to be your loyal partner. If you're ready to open your heart and home to Rocky, visit our adoption center today. Rocky is eagerly waiting to become a cherished member of your family and is excited to bring joy and excitement into your life."),
 (12, "Introducing Bruno, a gentle and affectionate Cavalier King Charles Spaniel with a heart full of love and a wagging tail that never stops. If you're searching for a loyal and charming companion, Bruno could be the perfect addition to your family. Bruno is a charming Cavalier King Charles Spaniel known for his sweet temperament and beautiful coat. His expressive eyes and silky ears make him utterly irresistible. Bruno's gentle nature and unwavering loyalty make him the ideal choice for those seeking a devoted and loving friend. Bruno dreams of finding his forever home—a place where he can bring comfort, joy, and companionship. Whether it's cuddling on the couch, going for leisurely walks, or simply being your constant shadow, Bruno is ready to fill your days with love. If you're ready to open your heart and home to Bruno, visit our adoption center today. Bruno is eagerly waiting to become a cherished member of your family and is excited to offer his unconditional love"),
 (13, "Introducing Max, a joyful and friendly Golden Retriever with a heart full of love and a wagging tail that never stops. If you're seeking a loyal and affectionate companion, Max might be the perfect match for your family. Max is a handsome Golden Retriever known for his sunny disposition and golden coat that glistens in the sunlight. His warm brown eyes and friendly smile make him an instant charmer. Max's gentle nature and unwavering loyalty make him an ideal choice for those seeking a devoted and loving friend. Max dreams of finding his forever home—a place where he can be your faithful companion and bring happiness to your life. Whether it's playing fetch in the backyard, going for long walks, or simply snuggling on the couch, Max is ready to be by your side. If you're ready to open your heart and home to Max, visit our adoption center today. Max is eagerly waiting to become an integral part of your family and is excited to offer his unconditional love."),
 (14, "Introducing Saddie, a charming and fluffy Pomeranian with a heart full of love and a personality as bright as sunshine. If you're searching for a pint-sized companion with a big heart, Saddie might be the perfect addition to your life. Saddie is an enchanting Pomeranian known for her delightful appearance and spirited character. Her fluffy coat and bright eyes make her irresistibly cute. Saddie's loving nature and boundless affection make her the ideal choice for those seeking a devoted and charming friend. Saddie dreams of finding her forever home—a place where she can bring warmth and happiness to your life. Whether it's prancing around the garden, cuddling on your lap, or simply brightening your days with her presence, Saddie is ready to be your loyal and lovable companion. If you're ready to open your heart and home to Saddie, visit our adoption center today. Saddie is eagerly waiting to become a cherished member of your family and is excited to offer her unwavering love."),
 (15, "Introducing Lucy, a lively and lovable Boxer-Beagle mix with a heart full of enthusiasm. If you're searching for a furry friend with a perfect blend of energy and affection, Lucy might be the perfect match for your active lifestyle. Lucy is a delightful Boxer-Beagle mix known for her playful spirit and charming personality. Her unique appearance and expressive eyes make her a true standout. Lucy's zest for life and unwavering loyalty make her an ideal choice for those seeking a devoted and fun-loving companion. Lucy dreams of finding her forever home—a place where she can share her love and energy with a loving family. Whether it's going for long walks, playing fetch in the park, or simply snuggling up with you, Lucy is ready to be your constant source of joy. If you're ready to open your heart and home to Lucy, visit our adoption center today. Lucy is eagerly waiting to become a cherished member of your family and is excited to offer her boundless love and companionship."),
 (16, "Introducing Cleo, a graceful and charming Tabby Cat with a heart full of elegance. If you're seeking a feline friend with poise and affection, Cleo might be the purrfect addition to your home. Cleo is a stunning Tabby Cat known for her striking markings and endearing personality. Her beautiful fur and bright eyes make her a true beauty. Cleo's gentle nature and sweet disposition make her the ideal choice for those seeking a loving and graceful companion. Cleo dreams of finding her forever home—a place where she can grace your life with her presence. Whether it's lounging by the window, playing with feather toys, or simply sharing quiet moments with you, Cleo is ready to be your loyal and loving feline friend. If you're ready to open your heart and home to Cleo, visit our adoption center today. Cleo is patiently waiting to become an integral part of your family and is excited to offer her unconditional love and purrs. Don't miss the chance to make Cleo your cherished companion. Contact us now to begin your journey toward a lifetime of tranquility and happiness with your new feline friend, Cleo!"),
 (17, "Introducing Oliver, a one-of-a-kind Turkish Van and Domestic Shorthaired Cat mix with a heart full of charm and personality. If you're looking for a feline friend with a touch of elegance and a dash of playfulness, Oliver could be the perfect addition to your family. Oliver is a captivating mix of Turkish Van and Domestic Shorthaired Cat known for his distinctive appearance and playful nature. His mesmerizing two-toned coat and inquisitive eyes make him truly special. Oliver's spirited personality and unwavering loyalty make him an ideal choice for those seeking a unique and loving companion. Oliver dreams of finding his forever home—a place where he can bring delight and amusement to your life. Whether it's chasing after feather toys, curling up in your lap, or simply being your constant source of joy, Oliver is ready to be your beloved feline friend. If you're ready to open your heart and home to Oliver, visit our adoption center today. Oliver is eagerly waiting to become an integral part of your family and is excited to offer his unconditional love and playful antics."),
 (18, "Introducing Luna, an elegant and unique Sphinx Cat with a heart full of warmth and charm. If you're searching for a feline friend with a striking appearance and a gentle spirit, Luna might be the perfect addition to your home. Luna is a stunning Sphinx Cat known for her hairless body and captivating eyes. Her graceful and elegant appearance makes her truly extraordinary. Luna's affectionate nature and sweet disposition make her the ideal choice for those seeking a loving and distinctive companion. Luna dreams of finding her forever home—a place where she can share her warmth and companionship. Whether it's cuddling up with you under a cozy blanket, basking in the sun, or simply being your constant source of comfort, Luna is ready to be your devoted feline friend. If you're ready to open your heart and home to Luna, visit our adoption center today. Luna is patiently waiting to become an integral part of your family and is excited to offer her unconditional love and companionship. "),
 (19, "Introducing Whiskers, a charming blend of Himalayan and Tabby Cat with a heart full of grace and personality. If you're searching for a feline friend with a unique and striking appearance, Whiskers might be the purrfect addition to your family. Whiskers is a captivating mix of Himalayan and Tabby Cat known for his beautiful markings and captivating eyes. His luxurious fur and inquisitive gaze make him truly special. Whiskers' gentle nature and affectionate demeanor make him the ideal choice for those seeking a unique and loving companion. Whiskers dreams of finding his forever home—a place where he can bring joy and contentment to your life. Whether it's lounging by the window, playing with feather toys, or simply sharing quiet moments with you, Whiskers is ready to be your loyal and loving feline friend. If you're ready to open your heart and home to Whiskers, visit our adoption center today. Whiskers is eagerly waiting to become an integral part of your family and is excited to offer his unconditional love and companionship.");


CREATE TABLE pets.orders (
  order_id INT NOT NULL,
  pet_id INT NOT NULL,
  user_id INT NOT NULL,
  quantity INT NOT NULL,
  order_date DATETIME NOT NULL,
  address_line VARCHAR(64) NOT NULL,
  postcode VARCHAR(8) NOT NULL,

  PRIMARY KEY(order_id, pet_id, user_id),

  FOREIGN KEY (pet_id) REFERENCES petsinfo(pet_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (postcode) REFERENCES postcodes(postcode)
);

CREATE TABLE pets.vets(
    vet_id INT PRIMARY KEY AUTO_INCREMENT,
    firstname VARCHAR(32) NOT NULL,
    lastname VARCHAR(32) NOT NULL,
    contactnumber VARCHAR(25) NOT NULL,
    emailaddress VARCHAR(25) NOT NULL


);

CREATE TABLE pets.bookings(
  booking_id INT NOT NULL AUTO_INCREMENT,
  user_id INT NOT NULL,
  vet_id INT NOT NULL,
  booking_date DATE NOT NULL,
  booking_time VARCHAR(11),

  PRIMARY KEY(booking_id, user_id, vet_id),

    
  FOREIGN KEY (user_id) REFERENCES users(user_id),
  FOREIGN KEY (vet_id) REFERENCES vets(vet_id)
);

INSERT INTO pets.vets (firstname, lastname, contactnumber, emailaddress) VALUES
("Angela", "Ziegler", "07123 456 789", "angela.ziegler@pawfectcare.co.uk"),
("John", "Smith", "07456 789 123", "john.smith@example.com"),
("James", "Evans", "07789 234 567", "james.evans@vetsrus.com"),
("Amelia", "King", "07901 345 678 ", "amelia.king@vetpractice.org.uk"),
("Laura", "Davis", "07345 678 901", "laura.davis@vetgroup.co.uk"),
("David", "Lis", "07654 321 098", "david_brown@mail.uk"),
("Michael", "Taylor", "07543 210 987", "michael_taylor@animals.uk"),
("Sarah", "Johnson", "07890 876 543", "sarah.j@example.co.uk"),
("Benjamin", "Wright", "07761 234 567", "benjamin.wright@petsclinic.co.uk");

UPDATE pets.users
SET user_role = "Admin"
WHERE username = "rektusmaximus";

