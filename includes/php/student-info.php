<?php
class StudentInfo {
   protected $_male_first_names;
   protected $_female_first_names;
   protected $_first_names;
   protected $_last_names;
   protected $_fname_index;
   protected $_lname_index;

   public function __construct() {
      
   }
   
   public function generateId() {
      $length = 6;
      return rand(pow(10, $length-1), pow(10, $length)-1);
   }
   
   public function firstName () {
      $_female_first_names = array(
         "Chloe","Emily","Aaliyah","Emma","Jennifer","Olivia","Hannah","Jessica","Sarah","Lily",
         "Savannah","Isabella","Sophia","Ava","Grace","Ella","Mia","Charlotte","Elizabeth","Abigail",
         "Rebecca","Samantha","Lauren","Ashley","Anna","Nicole","Zoe","Madison","Megan","Amy",
         "Jasmine","Katie","Sophie","Amber","Alyssa","Jade","Lucy","Abby","Kellie","Natalie",
         "Amanda","Bella","Rachel","Taylor","Alexis","Paige","Vanessa","Ellie","Lilly","Alice"
      );

      $_male_first_names = array(
         "Jacob","Shawn","Muhammad","Aaron","Daniel","Jonah","Alex","Michael","James","Ryan",
         "Lia","David","Matthew","Jack","Ethan","Luke","Jordan","Harry","Alexander","Ali",
         "Tyler","Kevin","Joshua","Dylan","Blake","Zayn","Andrew","Christopher","Joseph","John",
         "Ada","Noah","William","Aiden","Spencer","Nathan","Niall","Logan","Austin","Jason",
         "Robert","Anthony","Louis","Jayden","Brian","Mason","Kyle","Max","Brandon","Jackson"
      );
      
      $_first_names = array_merge($_male_first_names, $_female_first_names);
      
      $index = rand(0, count($_first_names) - 1);
      
      return $_first_names[$index];
   }
   
   public function lastName() {
         $_last_names = array(
      "Smith","Johnson","Williams","Brown","Jones","Miller","Davis","Garcia","Rodriguez",
      "Wilson","Martinez","Anderson","Taylor","Thomas","Hernandez","Moore","Martin","Jackson",
      "Thompson","White","Lopez","Lee","Gonzalez","Harris","Clark","Lewis","Robinson","Walker",
      "Perez","Hall","Young","Allen","Sanchez","Wright","King","Scott","Green","Baker","Adams",
      "Nelson","Hill","Ramirez","Campbell","Mitchell","Roberts","Carter","Phillips","Evans",
      "Turner","Torres","Parker","Collins","Edwards","Stewart","Flores","Morris","Nguyen","Murphy",
      "Rivera","Cook","Rogers","Morgan","Peterson","Cooper","Reed","Bailey","Bell","Gomez","Kelly",
      "Howard","Ward","Cox","Diaz","Richardson","Wood","Watson","Brooks","Bennett","Gray","James",
      "Reye","Cruz","Hughes","Price","Myers","Long","Foster","Sanders","Ross","Morales","Powell",
      "Sullivan","Russell","Ortiz","Jenkins","Gutierrez","Perry","Butler","Barnes","Fisher"
   );
      $index = rand(0, count($_last_names) - 1);

      return $_last_names[$index];
   }
}
?>
