<?php
// Include the database constants
include_once("_db-config.php");

   if(!empty($_GET['sessionSet'])){ $_SESSION[$_GET['sessionSet']] = $_GET['value']; }

   // Custom include function to make things easy
	function ev_include($include, $root=true, $includeTimes='', $Global=''){	
		if($root){ $include = $_SERVER['DOCUMENT_ROOT'].$include; }
		if(file_exists($include)){
			if($includeTimes == 'once'){
				include_once($include); }else{
				include($include); }
		}else{
			print 'path [ '.$include.' ] not found';	
		}
	}
   
   // Include all necessary classes
   ev_include("/includes/php/user-service.php");
   ev_include("/includes/php/student-info.php");
   
   function changeTheme($theme) {
      unset($_SESSION['theme']);
      $_SESSION['theme'] = $theme;
      header('Location: ../index.php');
   }
   
   // Student sign in
   function studentSignin() {
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
      $student_info = new StudentInfo();
      
      //$student_id = $student_info->generateId();
      $fname = $student_info->firstName();
      $lname = $student_info->lastName();
      
      session_unset();
      
      $query = "SELECT * FROM student WHERE student_fname = :fname AND student_lname = :lname";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':fname', $fname);
      $stmt->bindParam(':lname', $lname);
      $stmt->execute();
      if($stmt->fetch(PDO::FETCH_ASSOC)) {
         while ($student = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['user_id'] = $student['student_id'];
            $_SESSION['f_name'] = $student['student_fname'];
            $_SESSION['l_name'] = $student['student_lname'];
            $_SESSION['theme'] = "red";
            $_SESSION['rank'] = 1;
         }
      } else {
         $student_id = $student_info->generateId();
         $_SESSION['user_id'] = $student_id;
         $_SESSION['f_name'] = $fname;
         $_SESSION['l_name'] = $lname;
         $_SESSION['theme'] = "red";
         $_SERVER['rank'] = 1;
      
      
         $query = "INSERT INTO student (student_id, student_fname, student_lname) VALUES (:student_id, :fname, :lname)";
         $stmt = $pdo->prepare($query);
         $stmt->bindParam(':student_id', $student_id, PDO::PARAM_INT);
         $stmt->bindParam(':fname', $fname);
         $stmt->bindParam(':lname', $lname);
         $stmt->execute();
         
         //$course_id = rand(1,3);
         $query = "SELECT * FROM class"; // This part can just be replaced with a COUNT function
         $stmt = $pdo->prepare($query);
         $stmt->execute();
         $num_classes = $stmt->rowCount();
         
         $classes_enrolled = array();
         
         $classes_enrolled[0] = rand(1,3);
         
         while (($i = rand(1,3)) == $classes_enrolled[0]);
         $classes_enrolled[1] = $i;
         
         while (($i = rand(1,3)) == $classes_enrolled[0] || $i == $classes_enrolled[1]);
         $classes_enrolled[2] = $i;
                  
         for ($i = 0; $i < 3; $i++) {
           $query = "INSERT INTO enroll (enroll_student_id, enroll_class_id) VALUES (:student_id, :course_id)";
           $stmt = $pdo->prepare($query);
           $stmt->bindParam(':student_id', $student_id);
           $stmt->bindParam(':course_id', $classes_enrolled[$i]);
           $stmt->execute();
         }
      }
      
      $pdo = null;
   }
   
   function teacherSignin() {
               try {
      $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
      $query = "SELECT COUNT(*) FROM teacher";
      $result = $pdo->query($query);
      $max_id = $result->fetchColumn();   
         
      $teacher_id = rand(1, $max_id);
      
      $query = "SELECT * FROM teacher WHERE teacher_id = :teacher_id";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':teacher_id', $teacher_id, PDO::PARAM_INT);
      $stmt->execute();
      while ($teacher = $stmt->fetch(PDO::FETCH_ASSOC)) {
         $_SESSION['user_id'] = $teacher['teacher_id'];
         $_SESSION['f_name'] = $teacher['teacher_fname'];
         $_SESSION['l_name'] = $teacher['teacher_lname'];
         $_SESSION['rank'] = 2;
      }
      
      $pdo = null;
   }
   
   //Unsets all sessions and logs the user out
   function logout() {
      if (isset($_SESSION['user_id'])) {
         session_unset();
         header('Location: ../index.php');
      }
   } 
   // Smart GET function
   function GET($name=NULL, $value=false, $option="default")
   {
    $option=false; // Old version depricated part
    $content=(!empty($_GET[$name]) ? trim($_GET[$name]) : (!empty($value) && !is_array($value) ? trim($value) : false));
    if(is_numeric($content))
        return preg_replace("@([^0-9])@Ui", "", $content);
    else if(is_bool($content))
        return ($content?true:false);
    else if(is_float($content))
        return preg_replace("@([^0-9\,\.\+\-])@Ui", "", $content);
    else if(is_string($content))
    {
        if(filter_var ($content, FILTER_VALIDATE_URL))
            return $content;
        else if(filter_var ($content, FILTER_VALIDATE_EMAIL))
            return $content;
        else if(filter_var ($content, FILTER_VALIDATE_IP))
            return $content;
        else if(filter_var ($content, FILTER_VALIDATE_FLOAT))
            return $content;
        else
            return preg_replace("@([^a-zA-Z0-9\+\-\_\*\@\$\!\;\.\?\#\:\=\%\/\ ]+)@Ui", "", $content);
    }
    else false;
   }
   
   function getRatingInfo($id, $type) {
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
      
      $query = "SELECT * FROM class WHERE class_id = :class_id";
      $stmt  = $pdo->prepare($query);
      $stmt->bindParam(':class_id', $id);
      $stmt->execute();
      
      $class_list = $stmt->fetchAll();
      foreach ($class_list as $class_results) {
         if ($type == "course") {
            $query = "SELECT * FROM course WHERE course_id = :class_course_id";
            $stmt  = $pdo->prepare($query);
            $stmt->bindParam(':class_course_id', $class_results['class_course_id']);
            $stmt->execute();
            
            $course_list = $stmt->fetchAll();
            
            foreach ($course_list as $i) {
               return $i;
            }
            
         }
         if ($type == "teacher") {
            $query = "SELECT * FROM teacher WHERE teacher_id = :class_teacher_id";
            $stmt  = $pdo->prepare($query);
            $stmt->bindParam(':class_teacher_id', $class_results['class_teacher_id']);
            $stmt->execute(); 
            
            $teacher_list = $stmt->fetchAll();
            
            foreach ($teacher_list as $i) {
               return $i;
            }
         }
         if ($type == "teacher_rating") {
            $query = "SELECT * FROM teacher_rating WHERE student_id = :student_id AND teacher_rating_active = 1 AND teacher_id = :class_teacher_id";
            $stmt  = $pdo->prepare($query);
            $stmt->bindParam(':student_id', $_SESSION['user_id']);
            $stmt->bindParam(':class_teacher_id', $class_results['class_teacher_id']);
            $stmt->execute(); 
            
            $teacher_list = $stmt->fetchAll();
            
            foreach ($teacher_list as $i) {
               return $i;
            }
         }
         if ($type == "course_rating") {
            $query = "SELECT * FROM course_rating WHERE student_id = :student_id AND course_rating_active = 1 AND course_id = :class_course_id";
            $stmt  = $pdo->prepare($query);
            $stmt->bindParam(':student_id', $_SESSION['user_id']);
            $stmt->bindParam(':class_course_id', $class_results['class_course_id']);
            $stmt->execute(); 
            
            $teacher_list = $stmt->fetchAll();
            
            foreach ($teacher_list as $i) {
               return $i;
            }
         }
      }
   }
   
   function rateTeacher($s_id, $t_id, $rate, $comment, $tc_id) {
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
      
      $comment = htmlentities($comment);
      
      $query = "SELECT * FROM teacher_rating WHERE student_id=:student_id";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':student_id', $_SESSION['user_id']);
      $stmt->execute();
      
      if($stmt->fetch(PDO::FETCH_ASSOC)) {
         $query = "UPDATE teacher_rating SET teacher_rating_active = 0 WHERE student_id = :student_id AND teacher_id = :t_id";
         $stmt = $pdo->prepare($query);
         $stmt->bindParam(':student_id', $_SESSION['user_id']);
         $stmt->bindParam(':t_id', $t_id);
         $stmt->execute();
      }

      $query = "INSERT INTO teacher_rating (teacher_id, student_id, rating, comment, teacher_course_id) VALUES (:t_id, :s_id, :rate, :comment, :tc_id)";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':t_id', $t_id);
      $stmt->bindParam(':s_id', $s_id);
      $stmt->bindParam(':rate', $rate);
      $stmt->bindParam(':comment', $comment);
      $stmt->bindParam(':tc_id', $tc_id);
      $stmt->execute();
   }
   
   function getCourseRating($id) {
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }

      $query = "SELECT * FROM course_rating WHERE class_id = :course_id AND course_rating_active = 1";
      $stmt  = $pdo->prepare($query);
      $stmt->bindParam(':course_id', $id);
      $stmt->execute();
                  
      $class_ratings = $stmt->fetchAll();
      $total_count = 0;
      foreach ($class_ratings as $result) {
         $total_rating += $result['rating'];
         $total_count += 1;
      }
      
      return $total_rating / $total_count;
   }
   
   function getTeacherRating($id) {
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }

      $query = "SELECT * FROM teacher_rating WHERE teacher_id = :teacher_id AND teacher_rating_active = 1";
      $stmt  = $pdo->prepare($query);
      $stmt->bindParam(':teacher_id', $id);
      $stmt->execute();
                  
      $teacher_ratings = $stmt->fetchAll();
      $total_count = 0;
      foreach ($teacher_ratings as $result) {
         $total_rating += $result['rating'];
         $total_count += 1;
      }
      
      return $total_rating / $total_count;
   }
   
   function rateCourse($s_id, $c_id, $rate, $comment, $ct_id) {
      try {
         $pdo = new PDO(DB_PDODRIVER .':host='. DB_HOST .';dbname='. DB_NAME .'', DB_USER, DB_PASS);
      } catch (\PDOException $e) {
         echo "Connection failed: ". $e->getMessage();
         exit;
      }
      
      $comment = htmlentities($comment);
      
      $query = "SELECT * FROM course_rating WHERE student_id=:student_id";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':student_id', $_SESSION['user_id']);
      $stmt->execute();
      
      if($stmt->fetch(PDO::FETCH_ASSOC)) {
         $query = "UPDATE course_rating SET course_rating_active = 0 WHERE student_id = :student_id AND course_id = :c_id";
         $stmt = $pdo->prepare($query);
         $stmt->bindParam(':student_id', $_SESSION['user_id']);
         $stmt->bindParam(':c_id', $c_id);
         $stmt->execute();
      }
      
      $query = "INSERT INTO course_rating (class_id, student_id, rating, comment, course_teacher_id) VALUES (:c_id, :s_id, :rate, :comment, :t_id)";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':c_id', $c_id);
      $stmt->bindParam(':s_id', $s_id);
      $stmt->bindParam(':rate', $rate);
      $stmt->bindParam(':comment', $comment);
      $stmt->bindParam(':t_id', $ct_id);
      $stmt->execute();
   }
?>