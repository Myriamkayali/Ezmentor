-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2020 at 07:29 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `course-lecture`
--

DROP TABLE IF EXISTS `course-lecture`;
CREATE TABLE IF NOT EXISTS `course-lecture` (
  `courseID` int(11) NOT NULL,
  `lectureID` int(11) NOT NULL,
  PRIMARY KEY (`courseID`,`lectureID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `course-user`
--

DROP TABLE IF EXISTS `course-user`;
CREATE TABLE IF NOT EXISTS `course-user` (
  `cID` int(11) NOT NULL,
  `uID` int(11) NOT NULL,
  `last-lecture-ID` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cID`,`uID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course-user`
--

INSERT INTO `course-user` (`cID`, `uID`, `last-lecture-ID`) VALUES
(9, 12, 1),
(9, 16, 0),
(9, 18, 0),
(9, 19, 0),
(10, 30, 0),
(11, 19, 0),
(11, 20, 0),
(11, 26, 0),
(12, 12, 8),
(12, 22, 0),
(12, 27, 0),
(13, 18, 0),
(13, 25, 24),
(13, 30, 1),
(14, 12, 27),
(14, 16, 0),
(14, 19, 1),
(15, 12, 0),
(15, 27, 1),
(16, 20, 0),
(17, 18, 1),
(17, 19, 1),
(17, 21, 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `topic` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `authorlname` varchar(100) NOT NULL,
  `cost` varchar(255) DEFAULT '0',
  `startingdate` date NOT NULL,
  `endingdate` date NOT NULL,
  `target` varchar(255) NOT NULL,
  `syllabus` varchar(1000) NOT NULL,
  `quizID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`ID`, `name`, `topic`, `language`, `authorlname`, `cost`, `startingdate`, `endingdate`, `target`, `syllabus`, `quizID`) VALUES
(9, 'Introduction to Python', 'Programming', 'English', 'Telusko', '1200$', '2020-05-09', '2020-09-01', 'Students who want to be introduced to the basics of Python', 'Prerequisites\r\nThis course is not intended for absolute beginners in programming, but includes review of elementary features. Students are expected to be able to open command prompt window or terminal window, edit a text file, download and install software, and understand basic programming concepts.\r\n\r\nTechnology Requirements\r\nYou must have easy access to a computer with strong internet capabilities and a high-speed internet connection. \r\nContents: \r\n\r\nLesson 1: Introduction to Python\r\nLesson 2: Python Installation\r\nLesson 3: Getting Started with Python\r\nLesson 4: Variables in Python\r\nLesson 5: List in Python\r\nLesson 6: Tuple in Python\r\nLesson 7: Dictionary in Python', 1),
(10, 'Introduction to Java', 'Programming', 'English', 'Deepech', '1100$', '2020-07-07', '2020-10-12', 'People who want to be introduced to Java', 'Description\r\nThis course is an introduction to software engineering, using the Java™ programming language. It covers useful concepts. Students will learn the fundamentals of Java. The focus is on developing high quality, working software that solves real problems.\r\n\r\nThe course is designed for students with some programming experience, but if you have none and are motivated you will do fine.\r\n\r\nInstalling Java and Eclipse\r\nTo write Java programs, you need two things: the Java Development Kit (JDK), and a source code editor. Please follow these directions before the first lecture.\r\nThe Java Development Kit contains the tools needed to compile and run Java programs. The source code editor lets you write programs, and has features to make this easier. For this course, you can use any tool you like, but we recommend Eclipse, and will demonstrate it during the first lecture.\r\n\r\n', 2),
(11, 'Introduction to C', 'Programming', 'English', 'Rockett', '1500$', '2020-09-07', '2021-07-12', 'People who like to be introduced to C', 'This course exposes students to the C  programming language. The course covers basic\r\nsyntax, defining structures and classes, I/O, pointers, arrays, memory management, references,\r\noverloading, templates, the Standard Template Library, inheritance and polymorphism.', 3),
(12, 'Cooking 101', 'Cooking', 'English', 'Hilah', '500$', '2020-07-07', '2021-07-12', 'Who loves to Cook!', 'Learn how to cook easy recipes with me! We will mainly be interested with eggs and pancakes!', 4),
(13, 'Piano for Beginners', 'Music', 'English', 'Hilton', '300$', '2020-10-07', '2021-12-12', 'Beginners who want to learn Piano', 'How to play Piano for beginners; Learn the basics with Hilton', 5),
(14, 'Guitar Lessons for beginners', 'Music', 'English', 'Pahadi', '300$', '2020-09-09', '2021-09-09', 'Beginners to Guitar and lovers of Music!!! ', 'Learn the basics of Guitar with Acoustic Pahadi', 6),
(15, 'PSYC200', 'Psychology', 'English', 'Grace', '1500$', '2019-09-09', '2019-11-11', 'Students who want to be introduced to Pshycology', 'Department: Psychology\r\n\r\nCredits: 3\r\n\r\nCourse Coordinator: Chris Grace\r\n  \r\n \r\nTextbook and Other Required Material:\r\n \r\nCatalog Description:\r\nThis course provides a comprehensive introduction the area of cognitive psychology. It lays out the emergence and importance of cognitive psychology as a field of scientific research. Issues and findings are presented in sensation and perception, learning, memory, problem solving, thinking and reasoning, and language.\r\n \r\nPrerequisite(s): PSYC 100 or (PSYC 101 and PSYC 103)', 7),
(16, 'Crash Course on Social Psycology', 'Psycology', 'English', 'Green', '1000$', '2020-08-08', '2021-03-03', 'People who want to be introduced to Psycology', 'Crash Course on Social Influence,Thinking and Prejudice and discrimination', 8),
(17, 'Crash Course on Film Production', 'Film Production', 'English', 'Crash Course', '300$', '2021-01-01', '2021-03-03', 'People who want to be introduced to Film Production', 'Introduce your self to Film Production with Crash Course!', 9),
(18, 'Filmmaking Techniques for Directors', 'Film Production', 'English', 'Nolan', '1000$', '2021-09-09', '2021-10-10', 'Those who love to be in experts in Film Production!', 'Filmmaking Techniques!', 10);

-- --------------------------------------------------------

--
-- Table structure for table `lecture`
--

DROP TABLE IF EXISTS `lecture`;
CREATE TABLE IF NOT EXISTS `lecture` (
  `lID` int(11) NOT NULL AUTO_INCREMENT,
  `material` varchar(10000) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `courseID` int(11) NOT NULL,
  `description` varchar(3000) NOT NULL,
  PRIMARY KEY (`lID`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecture`
--

INSERT INTO `lecture` (`lID`, `material`, `link`, `courseID`, `description`) VALUES
(1, 'Introduction to Python\r\n\r\n', 'https://www.youtube.com/embed/hEgO047GxaQ', 9, 'Python is one of the fastest growing language  Python is interpreted, object oriented, high level, procedure oriented language  It has different versions  The reason behind it is there are huge number of libraries available in the market, many companies and developers are using it and it can be implemented in many areas.  It is general Purpose language as it can be used in Machine learning, GUI, Software Development, Web development and many more.'),
(2, 'Python Installation', 'https://www.youtube.com/embed/mbryl4MZJms\r\n', 9, 'In this lecture we will see : - Download and install Python interpreter - Download and install PyCharm IDE - Simple code in command prompt - Create project in PyCharm  Python is interpreted language so we need to install Python interpreter.  We will install interpreter from official website of python  IDE is require to write, compile, debug and run the code  There are multiple IDEs for python. We will use PyCharm  We will write sample code in command prompt  Download and install PyCharm  Create new project in PyCharm  Editing Monitors : https://amzn.to/2RfKWgL  https://amzn.to/2Q665JW  https://amzn.to/2OUP21a .  Editing Laptop : ASUS ROG Strix - (new version) https://amzn.to/2RhumwO   Camera : https://amzn.to/2OR56AV  lens : https://amzn.to/2JihtQo   Mics https://amzn.to/2RlIe9F  https://amzn.to/2yDkx5F'),
(3, 'Getting Started with Python', 'https://www.youtube.com/embed/DWgzHbglNIo', 9, 'In this lecture we will see :\r\n- Why do we code\r\n- Arithmetic operations\r\n- Addition\r\n- Subtraction\r\n- Multiplication\r\n- Division\r\n- Integer division, Float division\r\n- Arithmetic operation with brackets\r\n- Power of / Exponentiation operation\r\n- Modulo\r\n- String operations\r\n- Escape character\r\n- Printing same string n number of times\r\n- Printing raw string'),
(4, 'Variables in Python', 'https://www.youtube.com/embed/TqPzwenhMj0', 9, 'In this lecture we will see :\r\n- What is variable\r\n- Why do we need them\r\n- How to assign value to variable\r\n- Fetching value of previous operation\r\n- String value to variable\r\n- Fetching value of string variable by index number\r\n- Finding length of string\r\n'),
(5, '\r\n\r\nLists in Python', 'https://www.youtube.com/embed/Eaz5e6M8tL4', 9, 'In this lecture we will see :\r\n- Working with List\r\n- What is list\r\n- How to use list\r\n- Assign multiple values to variable\r\n- Printing value of list\r\n- Print value of list by index number\r\n- String list\r\n- List of different types of data types\r\n- Creating list with list : nested list\r\n- append function\r\n- insert function\r\n- remove function\r\n- pop function\r\n- delete function\r\n- extend function\r\n- Inbuilt functions of List : min, max, sum\r\n- sort function'),
(6, 'Tuples in Python', 'https://www.youtube.com/embed/Mf7eFtbVxFM', 9, 'In this lecture we will see :\r\n- Difference between Tuple and List\r\n- Create Tuple\r\n- Tuple function\r\n- Count\r\n- Where to use Tuple\r\n- What is set\r\n- Define set\r\n- Hashing in set\r\n- Set functions'),
(7, 'Dictionary in Python', 'https://www.youtube.com/embed/2IsF7DEtVjg', 9, 'In this lecture will talk about Dictionary in python.\r\nA dictionary is a simple data structure that maps a dictionary name to a set of key/value of each element. If officially you check the dictionary and you go to that page and then you understand the meaning of that word. If you can have this type of concept, where have key and vale, every value have unique key given by you not normal numbers, to achieve that of course you have to use dictionary itself. You will see in detail with example in this video.'),
(8, 'Java is a programming language and computing platform first released by Sun Microsystems in 1995. There are lots of applications and websites that will not work unless you have Java installed, and more are created every day. Java is fast, secure, and reliable. From laptops to datacenters, game consoles to scientific supercomputers, cell phones to the Internet, Java is everywhere!', 'https://www.youtube.com/embed/lL2PXC1fmnQ', 10, ''),
(9, 'Platform independent language means once compiled you can execute the program on any platform (OS). Java is platform independent. Because the Java compiler converts the source code to bytecode, which is Intermidiate Language. Bytecode can be executed on any platform (OS) using JVM( Java Virtual Machine).', 'https://www.youtube.com/embed/U4H1q1OGIo8', 10, ''),
(10, 'Learn JAVA – Session 3 II Essential components of Java , JVM, JRE, JSDK', 'https://www.youtube.com/embed/ealk6KXYjaA', 10, ''),
(11, '\r\n\r\n1. Getting up to speed with C programming on Windows\r\n2. Getting a C compiler via Microsoft Visual Studio Express: \r\n3. Creating a “Win32 Project”\r\n4. Adding a C++ file: test.cpp\r\n5. Compiling and Debugging project\r\n6. WinMain entry point function\r\n7. Creating and calling a function', 'https://www.youtube.com/embed/F3ntGDm6hOs', 11, ''),
(12, '1. Getting Visual Studio Community edition: http://www.visualstudio.com/\r\n2. Printing to the console with OutputDebugStringA ()\r\n3. Setting break points, intro to debugging\r\n4. Line breaks and the return character ‘\n’\r\n5. Watch Windows\r\n6. Macros, Switching from ASCII and UNICODE\r\n7. What’s a variable?\r\n8. Debugging integer assignments\r\n9. Inspecting values, Step Over (F10)\r\n10. Char, short and int types. Also unsigned types\r\n11. Disassembly window\r\n12. Registry window', 'https://www.youtube.com/embed/KF29ePTqWa4', 11, ''),
(13, '1. Intro to pointers\r\n2. Virtually memory\r\n3. Memory Window on Visual Studio\r\n4. Memory pages\r\n5. We have pictures!\r\n6. Why the memory bus is an issue for performance\r\n7. Latency, Throughput and Bandwidth\r\n8. CPU and Cache', 'https://www.youtube.com/embed/T4CjOB0y9nI', 11, ''),
(14, '1. More about Disassembly Window – Memory layout\r\n2. Little endian and big endian\r\n3. Intro to structs\r\n4. sizeof()\r\n5. How to read Hexadecimal numbers \r\n6. Casting \r\n7. Arrays and arrow operator for structs', 'https://www.youtube.com/embed/0CB1mYS5wBc', 11, ''),
(15, '1. Where do structs, variables and functions live?\r\n2. Diagram: Code-Compiler-Obj-Linker-Exe\r\n3. Arithmetic precedence of operators\r\n4. Bitwise operators: AND, OR, NOT, XOR (| & ^ ~)\r\n5. Logic operators\r\n6. Intro to flow control: if and if else\r\n7. Loops: While and for\r\n8. Switch statement\r\n9. Local variables on code blocks.\r\n10.  Scope and  stack', 'https://www.youtube.com/embed/Pb19uCFU2EA', 11, ''),
(16, 'How to Boil Eggs!', 'https://www.youtube.com/embed/wdasrVE5NOc', 12, 'Learn the easiest way to perfectly make hard boiled eggs with this video. Boiled eggs make a great quick snack and can be used to make egg salad, deviled eggs, or my breakfast meatloaf recipe! '),
(17, 'How to make an Omlet!', 'https://www.youtube.com/embed/PzWsyPHoSyQ', 12, 'Learn how to make an omelet. Now you can make a fancy, folded omelet at home! Or is it spelled omelette? Who cares! They are delicious!'),
(18, 'How to Make Scrambled Eggs', 'https://www.youtube.com/embed/Gf4eEhDpxgk', 12, 'Learn how to make scrambled eggs. Scrambled Eggs are an essential breakfast food. All you need is eggs and butter, salt and pepper!'),
(19, 'How to make Pancakes!', 'https://www.youtube.com/embed/yrlwaXARPNg', 12, 'Learn how to make pancakes with my FAVORITE buttermilk pancake recipe! Forget pancake mix, make pancakes from scratch! '),
(20, 'The Piano Keyboard', 'https://www.youtube.com/embed/QBH6IpRkVDs', 13, 'This first lesson covers the names of the notes on the piano keyboard, and how to understand how we use and refer to our fingers as pianists.\r\n'),
(21, 'Starting to read music', 'https://www.youtube.com/embed/3BULT0-joT0', 13, 'This is the second lecture in my course of \'how to\' piano tutorials for absolute beginners. In it, I start looking at how we read piano music, beginning with the five-line stave and the treble clef, which is usually used to notate the right hand. The piano keyboard has many more notes than there are on a single stave, so I also discuss how to read notes that lie outside the stave, using ledger lines'),
(22, 'Reading a Melody', 'https://www.youtube.com/embed/NUVQIwO1SEI', 13, 'This is the third piano tutorial in my \'How To Play Piano for Beginners\' project. In it, we begin to learn about different note lengths, how bars (measures) work, and what we mean as musicians when we talk about beat and time signature. By the end we\'re playing simple right hand melodies on your piano: being able to read melodies from music, and then phrase and shape them well on the piano keyboard is an essential skill for all pianists. Practising how to do it well is essential.\r\n\r\nAlso make sure that you\'ve really grasped the stuff we covered in the first two lessons in the series — in particular you need to have the note names at your fingertips (as it were), and be able find middle C on the piano without really thinking about it. From now on I\'m going to take it for granted you can do those things, so if you\'re still a bit wobbly, prioritize them in your piano practice! '),
(23, 'The Left Hand And The Scale Of C Major', 'https://www.youtube.com/embed/f9JI_5y0K68', 13, 'This is the fourth lecture in my How To Play Piano for Beginners series. Obviously, when you play piano you use both hands, and the music for each hand is usually written on separate staves, most often with treble clef for the right hand and bass clef for the left hand. So in this tutorial I look at the bass clef, how it\'s different from the treble clef from a pianist\'s point of view, and why it\'s important to learn how to read bass clef just as well as you can read treble clef. \r\n\r\nBass clef helps us notate the area of the piano keyboard where our left hand spends most of its time - that is, the octaves below middle C'),
(24, 'Learning a Piece', 'https://www.youtube.com/embed/1JVtPB8VJXE', 13, 'Lesson five in my series of tutorials on how to play piano for beginners. In this lesson we learn a practice piece that uses left and right hands together, with the right hand playing a melody in the treble clef while the left plays a simple bass line. The piece is written out in full piano score.'),
(25, 'A New Piece, A New Scale, And Rests', 'https://www.youtube.com/embed/yeP2qRcHuUM', 13, 'Welcome to lecture six in my scourse on how to play the piano for complete beginners. In this lesson you\'ll learn another new piano piece, a new time signature — 3/4 time — and discover rests, which are an important part of written music. When you learn to read piano music you\'re not just learning how to read notes, but also how to read silence: when you\'re playing the piano you\'re not constantly playing notes with both hands all the time: sometimes there are stretches of silence, and we notate those in our scores with rests that are timed in the same way as notes.\r\n\r\nIn this tutorial you\'ll also learn how to play the G major scale in right and left hands. G major is very similar to C major, but starts on G, and has one sharp in it — F#. That\'s a black note on the piano keyboard, and learning how to use your fingers properly in the G major scale will help you begin to practise switching between black and white notes smoothly, which is a really important skill to develop when you\'re learning to play the piano.'),
(26, 'Introduction of Guitar', 'https://www.youtube.com/embed/wAfbTvEeMmw', 14, 'When first learning guitar, it is important to have the material presented in stages, in an enjoyable way that allows you to grasp the basics of the instrument and music. The course begins simply with the parts of the guitar, the names of the strings, tuning, and technique-whether finger-style or pick.'),
(27, 'Strings of Guitar', 'https://www.youtube.com/embed/UIhlHxxFNQM', 14, 'STRINS OF GUITAR AND TUNING'),
(28, 'Basic Guitar Chords', 'https://www.youtube.com/embed/ODLFoDeUMqw', 14, 'BASIC GUITAR CHORDS'),
(29, 'Chords and Strumming', 'https://www.youtube.com/embed/bXcYT5lePX4', 14, 'MORE CHORDS AND STRUMMING'),
(30, 'Guitar for theory', 'https://www.youtube.com/embed/6sw25rlOle8', 14, 'GUITAR THEORY'),
(31, 'What is Psychology?', 'https://www.youtube.com/embed/f69yXoKvntY', 15, 'Dr. Chris Grace introduces his class to the topic of psychology.  With various examples, he explains what sort of human behaviors psychology is interested in studying. Dr. Grace has his class contribute with examples from their own experience.'),
(32, 'Psychology and Its Mysteries', 'https://www.youtube.com/embed/Odqc9bcIlvk', 15, 'Dr. Chris Grace explains the questions and topics that psychology seeks to answer. He presents a number of questions aimed at popular notions of psychology and shares their sometimes surprising results. Dr. Grace teases a handful of topics that will be presented later in his course.'),
(33, 'What Does Psychology Seek to Accomplish?', 'https://www.youtube.com/embed/u7YLpDovo7w', 15, 'Dr. Chris Grace explains the goals of psychology and gives a brief overview of the variety of perspectives that exist in the field. He shares some of the assumptions that underly much of modern science and explains how Christian assumptions play an equally valid role.'),
(34, 'History of Psychology', 'https://www.youtube.com/embed/4abu5Yyuuxc', 15, 'Dr. Chris Grace explains the history of psychology. He describes its development out of philosophy and medical science as well as the early ideas that existed at the start of the field. Dr. Grace also breifly discusses who is considered a psychologist and the range of jobs in psychology that exist today.'),
(35, 'How is Psychology Practiced? Part 1', 'https://www.youtube.com/embed/A7TJtS_NR-c', 15, 'Dr. Chris Grace discusses the methodology behind the study of psychology. He explains that psychology is rooted in empericism and skepticism, and that together these seek to find reliable data and answers to questions of the mind. Dr. Grace uses a handful of examples to demonstrate how a third variable often comes to play in correlated data.'),
(36, 'Social Thinking', 'https://www.youtube.com/embed/h6HLDV0T5Q8', 16, 'Why do people do bad things? Is it because of the situation or who they are at their core? In this week\'s episode of Crash Course Psychology, Hank works to shed a little light on the ideas of Situation vs. Personality. Oh, and we\'ll have a look at the Stanford Prison Experiment... It\'s alarming. '),
(37, 'Social Influence', 'https://www.youtube.com/embed/UGxGDdQnC1Y', 16, 'Why do people sometimes do bad things just because someone else told them to? And what does the term Groupthink mean? In today\'s episode of Crash Course Psychology, Hank talks about the ideas of Social Influence and how it can affect our decisions to act or to not act. '),
(38, 'Prejudice and Discrimination', 'https://www.youtube.com/embed/7P0iP2Zm6a4', 16, 'In this episode of Crash Course Psychology, Hank tackles some difficult topics dealing with prejudice, stereotyping, and discrimination. \r\nThere\'s a lot here, so let\'s get started. '),
(39, 'Aggression vs. Altruism', 'https://www.youtube.com/embed/XoTx7Rt4dig', 16, 'In our final episode of Crash Course Psychology, Hank discusses the ideas of Aggression and Altruism. These two things are difficult to understand and explain so sit tight and get ready to run the gauntlet of human emotions. '),
(40, 'Screenplays', 'https://www.youtube.com/embed/TARsoxST0tQ', 17, 'If you want to make a movie, generally you\'re going to want to start with a script. In this episode of Crash Course Film Production, Lily Gladstone talks about the basics of screenplays and how to get started thinking about and actually writing your movie.'),
(41, 'Pitching and Pre-Production', 'https://www.youtube.com/embed/JE53JL60ihc', 17, 'Pitching your movie to people can be hard. A studio, a friend, your mom... each of these entities will have different stressed and give you different results. But, what\'s important in a pitch? And what happens after the pitch? How do you get your movie ready to film? In this episode of Crash Course Film Production, Lily gives us some advice on both.'),
(42, 'The Filmmaker\'s Army', 'https://www.youtube.com/embed/TpAHZJc5In0', 17, 'Who does what on a film set? And how many of them are there? What is HMU? What is a Scripty? In this episode of Crash Course Film Production, Lily gives us A BIG OVERVIEW on the Production Team. Who they are, who they report to, and why they\'re important. '),
(43, 'Dissecting The Camera', 'https://www.youtube.com/embed/ivCBfJ1v_Qw', 17, 'Sometimes the most intimidating part of making a movie is that little box of concentrated technology called \'The Camera.\' But, FEAR NOT! In this episode of Crash Course Film Production, Lily helps us dissect the basics of modern movie cameras so you can have an easier time getting started... hopefully!'),
(44, 'Film Tone', 'https://www.youtube.com/embed/Tkbto1oLAnE', 18, 'Tone, mix of tint and shade, in painting and color theory\r\nTone, the lightness or brightness (as well as darkness) of a colour\r\nToning (coin), colour change in coins\r\nPhotographic print toning, a process that changes the color of monochromatic film, e.g. sepia tone'),
(45, 'Production Design', 'https://www.youtube.com/embed/wNXNEs2eBkg', 18, 'One of the most important ways to communicate a films mood, characters, and theme is through production design. Great production design elevates the entire story, and helps visionary directors impart their signature style.\r\n\r\nIn this video essay, the second in our visual storytelling series, we break down production design. What is production design, how do the great filmmakers and visual storytellers employ it, and how can you use it to bring your vision to life using our free production design worksheet.'),
(46, 'Film Blocking Tutorial ', 'https://www.youtube.com/embed/9AGaECt9j4g', 18, 'In today\'s video, we\'ll cover key film blocking techniques that master directors use to create memorable scenes. Grab the FREE film blocking worksheet to stage scenes better: http://bit.ly/2A8cEIq\r\n\r\n\r\nWe’ll learn about directing actors and the basics of film blocking. \r\n\r\nDoes the idea of watching two people having a conversation sound exciting? Probably not. You probably wouldn’t pay money to see that. And yet you do every time you go to the movies.\r\n\r\nHow have so many filmmakers managed to make those conversations exciting?\r\n\r\nWell, one big way is with film blocking. Film blocking is the “precise staging of actors in a performance”. In terms of cinema, it’s where you place your actors in the frame.\r\n\r\nIt’s more than who stands where. Film blocking conveys the mood and tone you convey with what happens in the frame. We’ll use film blocking and mis-en-scene to bolster your knowledge so you can take everything you learn on set. \r\n\r\nWe’ll incorporate Film Theory, Film Criticism, and practical reasoning to show you how to get the most out of your efforts.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `quID` int(11) NOT NULL AUTO_INCREMENT,
  `qID` int(11) NOT NULL,
  `exercise` varchar(1000) NOT NULL,
  `option1` varchar(1000) NOT NULL,
  `option2` varchar(1000) NOT NULL,
  `option3` varchar(1000) NOT NULL,
  `correctanswer` varchar(100) NOT NULL,
  PRIMARY KEY (`quID`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`quID`, `qID`, `exercise`, `option1`, `option2`, `option3`, `correctanswer`) VALUES
(1, 1, 'What is a correct syntax to output \'Hello World\' in Python?', 'print(\'Hello World\')', 'echo(\'Hello World\')', 'p(\'Hello World\')', 'a'),
(2, 1, 'How do you comment in Python?', '/*This is a comment*/', '#This is a comment', '//This is a comment', 'c'),
(3, 1, 'What is the correct file extension for Python files?', '.pyt', '.py', '.pyth', 'b'),
(4, 1, 'How do you create a variable with the floating number 2.8?', 'x=2.8', 'x=float(2.8)', 'None of the answers is correct', 'a'),
(5, 1, 'What is the correct syntax to output the type of a variable or object in Python?', 'typeof(x)', 'typeOf(x)', 'type(x)', 'c'),
(6, 1, 'What is the correct way to create a function in Python?', 'function myfunction():', 'def myfunction():', 'create myfunction():', 'b'),
(7, 1, 'What is a correct syntax to return the first character in a string?', 'x=\"Hello\"[0]', 'x=\"Hello\".sub(0,1)', 'x=\"Hello\".sub(0)', 'a'),
(8, 1, 'Which method can be used to remove any whitespace from both the beginning and the end of a string?', 'ptrim()', 'strip()', 'len()', 'b'),
(9, 1, 'Which method can be used to return a string in upper case letters?', 'upperCase()', 'uppercase()', 'upper()', 'c'),
(10, 1, 'Which method can be used to replace parts of a string?', 'replace()', 'switch()', 'repl()', 'a'),
(11, 1, 'Which operator is used to multiply numbers?', 'x', '#', '*', 'c'),
(12, 1, 'Which operator can be used to compare two values?', '=', '<>', '==', 'c'),
(13, 1, 'Which of these collections defines a LIST?', '(\'apple\',\'banana\')', '[\'apple\',\'banana\']', 'Both are valid', 'b'),
(14, 1, 'Which of these collections defines a TUPLE?', '(\'apple\', \'banana\', \'cherry\')', '[\'apple\', \'banana\', \'cherry\']', 'None of the 2 answers are correct', 'a'),
(15, 1, 'Which of these collections defines a SET?', '(\'apple\', \'banana\', \'cherry\')', '{\'apple\', \'banana\', \'cherry\'}', '[\'apple\', \'banana\', \'cherry\']', 'b'),
(16, 1, 'Which of these collections defines a DICTIONARY?', '{\r\n  \'brand\': \'Ford\',\r\n  \'model\': \'Mustang\',\r\n  \'year\': 1964\r\n}', '{\'apple\', \'banana\', \'cherry\'}', 'Both are valid', 'a'),
(17, 1, 'Which collection is ordered and allows duplicate members?', 'Tuple', 'Set', 'a&b', 'a'),
(18, 1, 'Which collection does not allow duplicate members?', 'Tuple', 'Set', 'List', 'b'),
(19, 1, 'How do you start writing an if statement in Python?', 'if x>y :', 'if(x>y)', 'if x>y then :', 'a'),
(20, 1, 'How do you start writing a while loop in Python?', 'while(x>y)', 'while x>y {', 'while x>y :', 'c'),
(21, 2, 'What is a correct syntax to output \'Hello World\' in Java?', 'print(\'Hello Word\')', 'System.out.println(\'Hello World\')', 'Both are valid', 'b'),
(22, 2, 'How do you insert COMMENTS in Java code?', '// This is a comment', '*/This is a comment */', '/This is a comment', 'a'),
(23, 2, 'How do you create a variable with the numeric value 5?', 'int x=5;', 'x=5;', 'num x=5;', 'a'),
(24, 2, 'Which method can be used to find the length of a string??', 'len()', 'length()', 'getsize()', 'b'),
(25, 2, 'Which method can be used to return a string in upper case letters?', 'upper()', 'toUpperCase()', 'UPPER()', 'b'),
(26, 2, 'Which operator is used to add together two values?', '+', '&', '*', 'a'),
(27, 2, 'Which operator can be used to compare two values?', '<>', '!=', '==', 'c'),
(28, 2, 'To declare an array in Java, define the variable type with:', '[]', '()', '{}', 'a'),
(29, 2, 'Array indexes start with:', '0', '1', '0 or 1', 'a'),
(30, 2, 'How do you create a method in Java?', '(methodname)', 'methodname()', 'methodname.', 'b'),
(31, 2, 'How do you call a method in Java?', 'methodname();', 'methodname[];', 'methodname;', 'a'),
(32, 2, 'Which keyword is used to create a class in Java?', 'classname', 'Myclass', 'class', 'c'),
(33, 2, 'What is the correct way to create an object called myObj of MyClass?', 'new myObj= MyClass();', 'MyClass myObj = new MyClass();', 'Both are correct', 'b'),
(34, 2, 'Which method can be used to find the highest value of x and y?', 'Math.max(x,y)', 'Math.maximum(x,y)', 'Math.highest(x,y)', 'a'),
(35, 2, 'Which operator is used to multiply numbers?', '#', '%', '*', 'c'),
(36, 2, 'Which keyword is used to import a package from the Java API library?', 'package', 'getlib', 'import', 'c'),
(37, 2, 'How do you start writing an if statement in Java?', 'if(x>y){', 'if (x>y) then:', 'if(x>y):', 'a'),
(38, 2, 'How do you start writing a while loop in Java?', 'while(x>y){', 'while x>y :', 'x>y while {', 'a'),
(39, 2, 'Which keyword is used to return a value inside a method?', 'get', 'return', 'void', 'b'),
(40, 2, 'Which statement is used to stop a loop?', 'exit', 'stop', 'break', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

DROP TABLE IF EXISTS `quiz`;
CREATE TABLE IF NOT EXISTS `quiz` (
  `qID` int(11) NOT NULL AUTO_INCREMENT,
  `cID` int(11) NOT NULL,
  PRIMARY KEY (`qID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`qID`, `cID`) VALUES
(1, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `token` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `username`, `fname`, `lname`, `email`, `verified`, `token`, `password`) VALUES
(12, 'admin', 'admin', 'admin', 'cmpsproject278@gmail.com', 1, '06e29a8cabe793b0f1c0127a2ae92b5732187dc93e81eb649954cd12150a7edc141365bfe8f495488272dfca2346b8a98dd2', '$2y$10$sDTAuhIFyIuaIzv/.O347OqpabI8eDZffxAd5mK99Wbi1o.O7jHyy'),
(16, 'nis', 'Nesrine', 'Dimachkieh', 'contactus278@gmail.com', 1, '127facb581e56649f93e449e32bb44569acd3bc9c6e67aef4c727d476bbb6fd5cdb3c30e20c174074e5d8ac507e676c1ff31', '$2y$10$QHLdxLWfmEpF1ccIlLQ7dehgY6k0cvEUMzDOFHwv255pWr2PVTf0.'),
(18, 'nad22', 'Nadine', 'Dimachkieh', '11930176@students.liu.edu.lb', 1, 'f9ac0c66e8649277fd314e0b70105d78717aec99ad0ba070f9b08f932938fbcdd7a724d9502ecd53a5788963ff71175519f2', '$2y$10$PkdnhJhKABmLQqVhPq50r.CTUXhvh8ke2Fv5KV2sC02Ibg6tg60Rm'),
(19, 'batoul', 'Batoul', 'Hammoud', 'batoulhammoud157@gmail.com', 1, '6b8de741eb8e4ec5bbff1fb9a2e2ad7f2ed9065dccb66e1fb0bde3e17977f43a9e76eb6310f991e623377d3d2a0d1dce6578', '$2y$10$yzumcLxDwO0MCTrWOaz7qe6Rru.ZGaggZQMCwrTLK0tPH5dGvS0oq'),
(20, 'nad', 'Nadine', 'Dimachkieh', 'nadinedim3@gmail.com', 1, 'e2ba00b6b0764f3681c1c5f4935b7f8360dec570afaa36f2efd127cedec0c678801b40747c4b19d37b9af935552cab26b896', '$2y$10$7QwfYdZ3RDDfOIb9gYeaMeQyHnxmjzfxHTIJmVjtDadXPpDFeydki'),
(21, 'hawraa', 'Hawraa', 'Hammoud', 'hawraahh05@gmail.com', 1, '9462b20e8ee3bf7229ca64b9f999e516a6fbd371b83bcb5f7242ab888c6c4f7c2d3843ba699ee6e7cbc96a3139f9ce4b870e', '$2y$10$g5rhH0jbEzYJ2nTAo7o4wOP5hTZaNrmAQlSIhBNVfODESkFS3jOvm'),
(22, 'stef', 'Stephanie', 'Haddad', 'cmpsgroup253@gmail.com', 1, '0b535f1500c9cdd825b36767bf86f79cb2dbdaab2e429a82bfea70e7677a3377ced51a71f69a67e9c0e25f549aea53237014', '$2y$10$2C6SBU0uwPN4MQ5DY25V9u1tg1Jd1D/NRiRbBSWV91k437p8FvXsy'),
(23, 'adam', 'Adam', 'Farhat', 'supermeterapp@gmail.com', 1, 'f9f6ae5a41292ff5c14c54deb4e9d088a6419ce12ad891a134e2d1c3b89b7b8039bfee75a82962525fb7443aaea04f924a4e', '$2y$10$XyaEiZ0f5ZrrvRIUcnrB/uyhZW8dgoS4Q5p6GnFZPyNsvdt9HIYTu'),
(25, 'reign', 'Reign', 'ElAhmar', 'batoulllhammoud@gmail.com', 1, 'b254daf2d6a2ebc33db85096ea43eb6e3646fce911a3a3839fd8fa8a5bafc73b33c791c26edaddcc44d933c57ecb7f78232a', '$2y$10$7S/Aq7DLlEVas6lEcHpVPeXePqZJ5pbOxEEoIW24qdJwXEM66n0rS'),
(26, 'yara', 'Yara', 'Berjawi', 'batoulhh99@gmail.com', 1, '51d0656f9bed5026d2a5fd2883ddc9430be0dac97c0ebc3188b28b03781469ad03a1af6b756b0105c6d69c3905e02b02da07', '$2y$10$Oj9mYKJoGubsOij.c/6NtuUPTXBICsubL1RPeXWPB5r2MJbx8MoSu'),
(27, 'zein', 'Zein', 'Mhaidly', 'bat1999123hey@gmail.com', 1, '002e893281694b7c38a523d004cfe2c5f759c33317d151a976aff7f4e6bff3aa3cd2af51241a7e05982420faa5669f9378f6', '$2y$10$pXCxTcp53KNyCEnu.hTGg.SUXliOd0Hgae4zWwvNguC6tbbDzuNtW'),
(29, 'ramzi', 'Ramzi', 'Rammouz', 'rammouzramzi302@gmail.com', 1, 'b43f0727f29e5cad3b10a739aee02dac1806475859b91530371a84572c3cc3328a8ea4fa3ea69c77ceccfeaca1cb79402be9', '$2y$10$8yC5XuOOyuUT0Kfu6S2Gze0vLkW0zXCxIZAPSWQcjfk/7BXgAEjTy'),
(30, 'sam', 'Sam', 'Zgheib', 'bhh05@mail.aub.edu', 1, '2b1088282e5e1b8608a90498519ceec0c6b94b4b65f6f8ec7505e441a91423d6fa412397a22056bd5b16db32b3574d5cd348', '$2y$10$I99CrhYbnUABfgRseT.yAOI/.xK9HkhZRom/5e1KgV2DI9q4yAP8e');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
