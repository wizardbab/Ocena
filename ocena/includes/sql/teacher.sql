-- Full PCC Teacher List
-- Created by En Yang Pang

CREATE TABLE IF NOT EXISTS 'teacher' (
   'teacher_id' int(11) NOT NULL AUTO_INCREMENT,
   'teacher_lname' varchar(255) DEFAULT NULL,
   'teacher_fname' varchar(255) DEFAULT NULL,
   'teacher_office' varchar(255) DEFAULT NULL,
   'teacher_email' varchar(255) DEFAULT NULL,
   PRIMARY KEY ('teacher_id')
);

INSERT INTO 'teacher' ('teacher_lname', 'teacher_fname', 'teacher_office', 'teacher_email') VALUES
('Abogunrin', 'Gloria', 'MK 204', 'gabogunrin@faculty.pcci.edu'),
('Achuff', 'Rob', 'MK 201', 'rachuff@faculty.pcci.edu'),
('Achuff', 'Rochelle', 'AC 206', 'roachuff@faculty.pcci.edu'),
('Adams', 'Beth', '', 'badams@faculty.pcci.edu'),
('Adams', 'Jeff', '', 'jadams@faculty.pcci.edu'),
('Ainsworth', 'Steve', 'VPA 111', 'sainsworth@faculty.pcci.edu'),
('Allnutt', 'Laura', '', 'lallnutt@faculty.pcci.edu'),
('Alvarez', 'Carlos', 'MK 332', 'calvarez@faculty.pcci.edu'),
('Amsbaugh', 'Jeff', '', 'jamsbaugh@faculty.pcci.edu'),
('Atkinson', 'Lee', '', 'latkinson@faculty.pcci.edu'),
('Autrey', 'Rhonda', '', 'rautrey@faculty.pcci.edu'),
('Bailey', 'Chuck', '', 'cbailey@faculty.pcci.edu'),
('Barnhart', 'David', '', 'dbarnhart@faculty.pcci.edu'),
('Becher', 'John', 'MK 502', 'jbecher@faculty.pcci.edu'),
('Belous', 'Anastasiya', 'VPA 209', 'abelous@faculty.pcci.edu'),
('Bombard', 'Amy', '', 'abombard@faculty.pcci.edu'),
('Bombard', 'Charles', 'VPA 107', 'cbombard@faculty.pcci.edu'),
('Bomske', 'Caleb', 'AC 608', 'cbomske@faculty.pcci.edu'),
('Borges', 'B', 'MK 406', 'bborges@faculty.pcci.edu'),
('Bowen', 'William', 'MK 401', 'wbowen@faculty.pcci.edu'),
('Bowman', 'Chris', 'AC 202', 'cbowman@faculty.pcci.edu'),
('Bowman', 'Micah', 'AC 603', 'mbowman@faculty.pcci.edu'),
('Brazil', 'Sandra', 'MK 206', 'sbrazil@faculty.pcci.edu'),
('Brewster', 'Judy', '', 'jbrewster@faculty.pcci.edu'),
('Bryant', 'Eric', '', 'ebryant@faculty.pcci.edu'),
('Bucy', 'Brian', 'AC 305', 'bbucy@faculty.pcci.edu'),
('Burke', 'Stephen', 'MK 209', 'sburke@faculty.pcci.edu'),
('Bushey ', 'Lorraine', 'MK 310', 'lbushey@faculty.pcci.edu'),
('Canada', 'Lucas', 'VPA 103', 'lcanada@faculty.pcci.edu'),
('Canada', 'Matheus', 'VPA 103', 'mcanada@faculty.pcci.edu'),
('Carlson', 'Fred', 'AC 501', 'fcarlson@faculty.pcci.edu'),
('Chapman', 'Jim', 'MK 209', 'jchapman@faculty.pcci.edu'),
('Chappell', 'Ruth Ann', '', 'rchappell@faculty.pcci.edu'),
('Christian', 'Casey', '', 'cchristian@faculty.pcci.edu'),
('Cirone', 'John', 'AC 406', 'jcirone@faculty.pcci.edu'),
('Coggin', 'B', 'MK 403', 'bcoggin@faculty.pcci.edu'),
('Colucci', 'Michael', '', 'mcolucci@faculty.pcci.edu'),
('Craig', 'Taisiya', 'AC 403', 'tcraig@faculty.pcci.edu'),
('Crocket', 'J', 'MK 309', 'jcrocket@faculty.pcci.edu'),
('Cuendet', 'John', 'AC 408', 'jcuendet@faculty.pcci.edu'),
('Dabbelt', 'Kimberly', '', 'kdabbelt@faculty.pcci.edu'),
('Davis', 'Brad', 'AC 409', 'bdavis@faculty.pcci.edu'),
('Davis', 'Denise', 'AC 303', 'ddavis@faculty.pcci.edu'),
('Davis', 'Michael', 'AC 304', 'mdavis@faculty.pcci.edu'),
('Delaney', 'R', 'MK 306', 'rdelaney@faculty.pcci.edu'),
('Digangi', 'Joseph A.', 'VPA 208', 'jadigangi@faculty.pcci.edu'),
('Digangi', 'Joseph D.', 'AC 505', 'jddigangi@faculty.pcci.edu'),
('Durrand', 'Jean', 'AC 604', 'jedurrand@faculty.pcci.edu'),
('Durrand', 'John', 'MK 333', 'jdurrand@faculty.pcci.edu'),
('Ebert', 'Aaron', 'VPA 210', 'aebert@faculty.pcci.edu'),
('Edwards', 'Joy', 'MK 312', 'jedwards@faculty.pcci.edu'),
('Einwechter', 'Priscilla', '', 'peinwechter@faculty.pcci.edu'),
('Elliott', 'Maybeth', 'MK 311', 'melliott@faculty.pcci.edu'),
('Enders', 'Colleen', 'VPA 206', 'cenders@faculty.pcci.edu'),
('Enders', 'Rick', '', 'renders@faculty.pcci.edu'),
('Eshleman', 'Sarah', '', 'seshleman@faculty.pcci.edu'),
('Fong', 'Sam', 'AC 608', 'sfong@faculty.pcci.edu'),
('Foster', 'Stewart', '', 'sfoster@faculty.pcci.edu'),
('Francis', 'Keith', 'MK 505', 'kfrancis@faculty.pcci.edu'),
('Fulfer', 'H', 'MK 503', 'hfulfer@faculty.pcci.edu'),
('Geary', 'Michael', 'AC 201', 'mgeary@faculty.pcci.edu'),
('Geesling', 'J', 'MK 312', 'jgeesling@faculty.pcci.edu'),
('Goetsch', 'Mark', '', 'mgoetsch@faculty.pcci.edu'),
('Goncalves', 'Cleusia', 'VPA 105', 'cgoncalves@faculty.pcci.edu'),
('Goncalves', 'Pitagoras', 'VPA 141', 'pgoncalves@faculty.pcci.edu'),
('Graby', 'Cindy', 'VPA 106', 'cgraby@faculty.pcci.edu'),
('Gramlich', 'Carolyn', 'AC 510', 'cgramlich@faculty.pcci.edu'),
('Grant', 'Landra', '', 'lgrant@faculty.pcci.edu'),
('Greening', 'Meredyth', '', 'mgreening@faculty.pcci.edu'),
('Gregory', 'Cheryl', 'MK 205', 'cgregory@faculty.pcci.edu'),
('Gregory', 'David', 'AC 302', 'dgregory@faculty.pcci.edu'),
('Griffin', 'Rafael', '', 'rgriffin@faculty.pcci.edu'),
('Grussendorf', 'Kurt', 'MK 501', 'kgrussendorf@faculty.pcci.edu'),
('Haire', 'T', 'MK 307', 'thaire@faculty.pcci.edu'),
('Hall', 'K', 'MK 310', 'khall@faculty.pcci.edu'),
('Halsey', 'Bryan', 'AC 203', 'bhalsey@faculty.pcci.edu'),
('Harnetty', 'R', 'MK 210', 'rharnetty@faculty.pcci.edu'),
('Hartkopf', 'Heather', 'MK 306', 'hhartkopf@faculty.pcci.edu'),
('Harvey', 'G', 'MK 506', 'gharvey@faculty.pcci.edu'),
('Heckel', 'John', 'AC 506', 'jheckel@faculty.pcci.edu'),
('Hewitt', 'Greg', 'VPA 210', 'ghewitt@faculty.pcci.edu'),
('Hill', 'David', 'VPA 139', 'dhill@faculty.pcci.edu'),
('Hill', 'Leah', 'VPA 142', 'lhill@faculty.pcci.edu'),
('Holmes', 'P', 'AC 409', 'pholmes@faculty.pcci.edu'),
('Howell', 'Joyce', '', 'jhowell@faculty.pcci.edu'),
('Howell', 'Robert', 'AC 205', 'rhowell@faculty.pcci.edu'),
('Huff', 'K', 'AC 306', 'khuff@faculty.pcci.edu'),
('Hulst', 'Kay', 'VPA 209', 'khulst@faculty.pcci.edu'),
('Hunt', 'L', 'MK 503', 'lhunt@faculty.pcci.edu'),
('Huskey', 'Katherine', 'AC 405', 'khuskey@faculty.pcci.edu'),
('Iwanowycz', 'D', 'AC 303', 'diwanowycz@faculty.pcci.edu'),
('Iwanowycz', 'Nick', 'AC 401', 'niwanowycz@faculty.pcci.edu'),
('Jaffe', 'Daisy', 'VPA 101', 'djaffe@faculty.pcci.edu'),
('Jekel', 'Brian', 'VPA 208', 'bjekel@faculty.pcci.edu'),
('Jekel', 'Jamieson', 'VPA 208', 'jjekel@faculty.pcci.edu'),
('Johnson', 'Fred', '', 'fjohnson@faculty.pcci.edu'),
('Johnson', 'Hannah', 'MK 213', 'hjohnson@faculty.pcci.edu'),
('Johnson', 'Shannon', 'AC 607', 'sjohnson@faculty.pcci.edu'),
('Keener', 'K', 'MK 312', 'kkeener@faculty.pcci.edu'),
('Kelley', 'R', 'AC 207', 'rkelley@faculty.pcci.edu'),
('Kove', 'Kevin', 'AC 606', 'kkove@faculty.pcci.edu'),
('Kozar', 'Elisabect', 'MK 407', 'ekozar@faculty.pcci.edu'),
('Kozar', 'Nick', '', 'nkozar@faculty.pcci.edu'),
('Lane', 'Benjamin', 'AC 610', 'blane@faculty.pcci.edu'),
('Lewis', 'Cheree', 'MK 304', 'chlewis@faculty.pcci.edu'),
('Lewis', 'Craig', '', 'clewis@faculty.pcci.edu'),
('Lilly', 'H', 'AC 403', 'hlilly@faculty.pcci.edu'),
('Loo', 'John', 'MK 203', 'jloo@faculty.pcci.edu'),
('Lowhorn', 'Greg', 'AC 407', 'glowhorn@faculty.pcci.edu'),
('Lowman', 'Mike', 'MK 402', 'mlowman@faculty.pcci.edu'),
('Lunsford', 'David', '', 'dlunsford@faculty.pcci.edu'),
('Machado', 'E', 'MK 310', 'emachado@faculty.pcci.edu'),
('Machado', 'Robert', 'AC 606', 'rmachado@faculty.pcci.edu'),
('Macon', 'Keaghlan', '', 'kmacon@faculty.pcci.edu'),
('Manciagli', 'Steve', 'MK 506', 'smanciagli@faculty.pcci.edu'),
('Marion', 'Donna', '', 'dmarion@faculty.pcci.edu'),
('Martinez', 'Nikki', 'MK 202', 'nmartinez@faculty.pcci.edu'),
('Mason', 'E', 'MK 305', 'emason@faculty.pcci.edu'),
('McCollim', 'Denise', 'MK 320', 'dmccollim@faculty.pcci.edu'),
('McDonald', 'James', 'MK 203', 'jmcdonald@faculty.pcci.edu'),
('McIntyre', 'Jonathan', 'VPA 104', 'jmcintyre@faculty.pcci.edu'),
('McIntyre', 'Lauren', 'MK 208', 'lmcintyre@faculty.pcci.edu'),
('McLamb', 'Debi', '', 'dmclamb@faculty.pcci.edu'),
('Mendez', 'Nino', 'MK 403', 'nmendez@faculty.pcci.edu'),
('Miller', 'Abran', 'MK 215', 'amiller@faculty.pcci.edu'),
('Miller', 'Greg', 'MK 201', 'gmiller@faculty.pcci.edu'),
('Miller', 'Jennifer', 'MK 206', 'jmiller@faculty.pcci.edu'),
('Mize', 'Josh', '', 'jmize@faculty.pcci.edu'),
('Monk', 'Charlene', 'MK 214', 'cmonk@faculty.pcci.edu'),
('Morehead', 'Chad', 'VPA 210', 'cmorehead@faculty.pcci.edu'),
('Mundt', 'David', 'AC 507', 'dmundt@faculty.pcci.edu'),
('Nelson', 'Arnold', '', 'anelson@faculty.pcci.edu'),
('Norris', 'R. Edwin', '', 'rnorris@faculty.pcci.edu'),
('Northrop', 'Stephen', 'MK 405', 'snorthrop@faculty.pcci.edu'),
('Nulph', 'Faith', 'AC 210', 'fnulph@faculty.pcci.edu'),
('Oberto', 'Sarah', 'MK 211', 'soberto@faculty.pcci.edu'),
('Oliveira', 'A', 'AC 408', 'aoliveira@faculty.pcci.edu'),
('Oliveira', 'Priscilla', 'VPA 143', 'poliveira@faculty.pcci.edu'),
('Ordway', 'G', 'AC 602', 'gordway@faculty.pcci.edu'),
('Owens', 'Keith', 'VPA 104', 'kowens@faculty.pcci.edu'),
('Pearson', 'Autumn', 'MK 204', 'apearson@faculty.pcci.edu'),
('Perez', 'J', 'MK 334', 'jperez@faculty.pcci.edu'),
('Peterlevitz', 'Gustavo', 'VPA 102', 'gpeterlevitz@faculty.pcci.edu'),
('Piero', 'T', 'MK 333', 'tpiero@faculty.pcci.edu'),
('Plank', 'Stephanie', '', 'splank@faculty.pcci.edu',
('Pope', 'Debbra', 'VPA 144', 'dpope@faculty.pcci.edu'),
('Porcher', 'Joel', 'MK 521', 'jporcher@faculty.pcci.edu'),
('Porter', 'Yvonne', 'MK 307', 'yporter@faculty.pcci.edu'),
('Preston', 'B', 'MK 503', 'bpreston@faculty.pcci.edu'),
('Pruitt', 'M', 'MK 211', 'mpruitt@faculty.pcci.edu'),
('Rand', 'Phyllis', '', 'prand@faculty.pcci.edu'),
('Raymond', 'Ann', 'MK 407', 'araymond@faculty.pcci.edu'),
('Reed', 'Jennifer', 'VPA 209', 'jreed@faculty.pcci.edu'),
('Reese', 'John', 'MK 400', 'jreese@faculty.pcci.edu'),
('Reynolds', 'A', 'MK 213', 'mreynolds@faculty.pcci.edu'),
('Richards', 'D', 'AC 501', 'drichards@.faculty.pcci.edu'),
('Ridgley', 'James', 'MK 331', 'jridgley@faculty.pcci.edu'),
('Ritchey', 'M', 'MK 309', 'mritchey@faculty.pcci.edu'),
('Robbins', 'Erin', 'AC 306', 'erobbins@faculty.pcci.edu'),
('Roberts', 'Scott', 'VPA 108', 'sroberts@faculty.pcci.edu'),
('Ross', 'Shawn', '', 'sross@faculty.pcci.edu'),
('Ross-Beeks', 'Donna', 'AC 601', 'drossbeeks@faculty.pcci.edu'),
('Rushing', 'Dan', '', 'drushing@faculty.pcci.edu'),
('Sax', 'C', 'MK 333', 'csax@faculty.pcci.edu'),
('Schmuck', 'Ron', 'AC 410', 'rschmuck@faculty.pcci.edu'),
('Schneider', 'James', '', 'jschneider@faculty.pcci.edu'),
('Schroder', 'Rachel', 'MK 304', 'rschroder@faculty.pcci.edu'),
('Schultze', 'Lynda', 'MK 305', 'lschultze@faculty.pcci.edu'),
('Sellars', 'Jared', '', 'jsellars@faculty.pcci.edu'),
('Shimmin', 'Stan', 'VPA 208', 'sshimmin@faculty.pcci.edu'),
('Skutt', 'Daniel', 'AC 602', 'dskutt@faculty.pcci.edu'),
('Slaughter', 'Flora', '', 'fslaughter@faculty.pcci.edu'),
('Sleeth', 'Naomi', 'AC 206', 'nsleeth@faculty.pcci.edu'),
('Sleeth', 'Steven', 'AC 505', 'ssleeth@faculty.pcci.edu'),
('Small', 'Rob', 'AC 503', 'rsmall@faculty.pcci.edu'),
('Smith', 'Donna', 'AC 404', 'dsmith@faculty.pcci.edu'),
('Smith', 'Lonnie', 'AC 401', 'lsmith@faculty.pcci.edu'),
('Smith', 'Mark', '', 'msmith@faculty.pcci.edu'),
('Smith', 'Mike', '', 'mismith@faculty.pcci.edu'),
('Smith', 'Shane', 'MK 420', 'ssmith@faculty.pcci.edu'),
('Smith', 'Shelton', '', 'shsmith@faculty.pcci.edu'),
('Soule', 'Greg', 'VPA 140', 'gsoule@faculty.pcci.edu'),
('Sparks', 'Jonathan', 'AC 204', 'jsparks@faculty.pcci.edu'),
('Spencer', 'Elijah', 'AC 605', 'espencer@faculty.pcci.edu'),
('Stelzer', 'Karl', '', 'kstelzer@faculty.pcci.edu'),
('Stemen', 'Mickey', 'AC 203', 'mstemen@faculty.pcci.edu'),
('Stucky', 'Marilyn', 'VPA 144', 'mstucky@faculty.pcci.edu'),
('Taylor', 'John', 'AC 502', 'jtaylor@faculty.pcci.edu'),
('Telega', 'B', 'MK 334', 'btelega@faculty.pcci.edu'),
('Thayer', 'Shawn', '', 'sthayer@faculty.pcci.edu'),
('Thompson', 'Dale', '', 'dthompson@faculty.pcci.edu'),
('Thompson', 'Marie', 'MK 421', 'mthompson@faculty.pcci.edu'),
('Troutman', 'Dan', 'AC 504', 'dtroutman@faculty.pcci.edu'),
('Twigg', 'Jared', 'AC 502', 'jtwigg@faculty.pcci.edu'),
('Twigg', 'Jennifer', 'MK 204', 'jetwigg@faculty.pcci.edu'),
('Van Etten', 'Elisabeth', 'MK 206', 'evanetten@faculty.pcci.edu'),
('Vaught', 'Josh', 'MK 331', 'jvaught@faculty.pcci.edu'),
('Vinaja', 'Elizabeth', 'MK 205', 'evinaja@faculty.pcci.edu'),
('Vinaja', 'Sean', 'MK 331', 'svinaja@faculty.pcci.edu'),
('Wade', 'Joan', 'MK 210', 'jwade@faculty.pcci.edu'),
('Walker', 'B', 'AC 507', 'bwalker@faculty.pcci.edu'),
('Walker', 'J', 'AC 510', 'jwalker@faculty.pcci.edu'),
('Wasser', 'James', '', 'jwasser@faculty.pcci.edu'),
('Waters', 'Gaylen', 'AC 208', 'gwaters@faculty.pcci.edu'),
('Watson', 'Aresia', 'AC 607', 'awatson@faculty.pcci.edu'),
('Weaver', 'B', 'MK 503', 'bweaver@faculty.pcci.edu'),
('Webb', 'Ashley', 'MK 211', 'awebb@faculty.pcci.edu'),
('Webb', 'Daniel', 'MK 215', 'dwebb@faculty.pcci.edu'),
('Whipple', 'Tina', 'AC 405', 'twhipple@faculty.pcci.edu'),
('Willard', 'Mike', '', 'mwillard@faculty.pcci.edu'),
('Willems', 'Pierre', 'AC 603', 'pwillems@faculty.pcci.edu'),
('Williams', 'Linda', 'AC 207', 'lwilliams@faculty.pcci.edu'),
('Willingham', 'Tim', 'VPA 112', 'twillingham@faculty.pcci.edu'),
('Winston', 'A', 'MK 304', 'awinston@faculty.pcci.edu'),
('Wolf', 'Jody', 'AC 301', 'jwolf@faculty.pcci.edu'),
('Yoder', 'Ronda', 'MK 303', 'ryoder@faculty.pcci.edu'),
('Yoo', 'Doori', 'VPA 109', 'dyoo@faculty.pcci.edu'),
('Yost', 'Lynda', 'MK 507', 'lyost@faculty.pcci.edu'),
('Yum', 'Chee', 'MK 507', 'cyum@faculty.pcci.edu'),
('Zila', 'Doug', 'MK 403', 'dzila@faculty.pcci.edu');