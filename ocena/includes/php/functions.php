<?php
// Include the database constants
include_once("_db-config.php");
//include_once("process-form.php");

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
   //ev_include("/includes/php/process-form.php");
   ev_include("/includes/php/user-service.php");
   ev_include("/includes/php/student-info.php");
   include("process-form.php");
   
   function changeTheme($theme) {
      unset($_SESSION['theme']);
      $_SESSION['theme'] = $theme;
      header('Location: ../index.php');
   }
   
   function roundProgress($n,$x=5) {
      return (round($n)%$x === 0) ? round($n) : round(($n+$x/2)/$x)*$x;
   }
   
   // Student sign in
   function studentSignin($pdo) {
      
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
   
   function teacherSignin($pdo) {
      
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
   
   function getRatingInfo($pdo, $id, $type) {
      
      $query = "SELECT * FROM class WHERE class_id = :class_id";
      $stmt  = $pdo->prepare($query);
      $stmt->bindParam(':class_id', $id);
      $stmt->execute();
     
      $class_list = $stmt->fetchAll();
      foreach ($class_list as $class_results) {
         //echo $class_results["class_course_id"];
         if ($type == "course") {
            $query = "SELECT * FROM course WHERE course_id = :id";
            $stmt  = $pdo->prepare($query);
            $stmt->bindParam(':id', $class_results["class_course_id"]);
            $stmt->execute();
            
            $course_list = $stmt->fetchAll();
            
            foreach ($course_list as $i) {
               return $i;
            }
            
         }
         if ($type == "teacher") {
            $query = "SELECT * FROM teacher WHERE teacher_id = :id";
            $stmt  = $pdo->prepare($query);
            $stmt->bindParam(':id', $class_results['class_teacher_id']);
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
            
            $teacher_rating_list = $stmt->fetchAll();
            
            foreach ($teacher_rating_list as $i) {
               return $i;
            }
         }
         if ($type == "course_rating") {
            $query = "SELECT * FROM course_rating WHERE student_id = :student_id AND course_rating_active = 1 AND course_id = :class_course_id";
            $stmt  = $pdo->prepare($query);
            $stmt->bindParam(':student_id', $_SESSION['user_id']);
            $stmt->bindParam(':class_course_id', $class_results['class_course_id']);
            $stmt->execute(); 
            
            $course_rating_list = $stmt->fetchAll();
            
            foreach ($course_rating_list as $i) {
               return $i;
            }
         }
      }
   }
   
   function getCourseRating($pdo, $id) {
      $course_ratings = [
         'general' => null,
         'q1' => null,
         'q2' => null,
         'q3' => null,
         'q4' => null,
         'q5' => null
      ];

      $query = "SELECT * FROM course_rating WHERE course_id = :course_id AND course_rating_active = 1";
      $stmt  = $pdo->prepare($query);
      $stmt->bindParam(':course_id', $id);
      $stmt->execute();
            
      if ($rating_results = $stmt->fetchAll()) {
         $total_ratings = [0, 0, 0, 0, 0, 0];
         $total_count = 0;
         
         foreach ($rating_results as $result) {
            $total_ratings[0] += $result['rating'];
            $total_ratings[1] += $result['course_question_one'];
            $total_ratings[2] += $result['course_question_two'];
            $total_ratings[3] += $result['course_question_three'];
            $total_ratings[4] += $result['course_question_four'];
            $total_ratings[5] += $result['course_question_five'];
            $total_count++;
         }
         
         $course_ratings['general'] = $total_ratings[0] / $total_count;
         $course_ratings['q1'] = $total_ratings[1] / $total_count;
         $course_ratings['q2'] = $total_ratings[2] / $total_count;
         $course_ratings['q3'] = $total_ratings[3] / $total_count;
         $course_ratings['q4'] = $total_ratings[4] / $total_count;
         $course_ratings['q5'] = $total_ratings[5] / $total_count;
         
      }
      
      return $course_ratings;
      
   }
   
   function getCourse($pdo, $id) {
      $query = "SELECT * FROM course WHERE course_id = :course_id";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':course_id', $id);
      $stmt->execute();
      
      $course = $stmt->fetch();
      return $course;
      
   }
   
   function updateRatings($pdo, $id, $type) {
      if ($type="course") {
         $query = "SELECT * FROM course_rating WHERE course_id = :course_id";
         $stmt = $pdo->prepare($query);
         $stmt->bindParam(':course_id', $id);
         $stmt->execute();
         
         $results = $stmt->fetchAll();
         
         foreach ($result as $result) {
            $query = "SELECT * FROM votes WHERE rating_id = :rating_id AND t_or_c = 1";
            $stmt = $pdo->preapre($query);
            $stmt->bindParam(':rating_id', $result['rating_id']);
            $stmt->execute();
            $vote_results = $stmt->fetchAll();
            
            $total_votes = 0;
            
            foreach($vote_results as $vote_result) {
               $total_votes += $vote_result['vote'];
            }
            
            $query = "SELECT";
            
         }
      }
      }
   
   
   function getComments($pdo, $id, $type) {
      if ($type == "course") {
         $query = "SELECT * FROM course_rating WHERE course_id = :course_id AND course_rating_active = 1 ORDER BY vote_count DESC";
         $stmt = $pdo->prepare($query);
         $stmt->bindParam(':course_id', $id);
         $stmt->execute();
         $results = $stmt->fetchAll();
         
         return $results;
      } else if ($type == "teacher") {
         
      }
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
   
   function submitRatings($pdo, $s_id, $c_id, $t_id, $c_tid, $t_cid, $t_gen, $c_gen, 
                        $t_q1, $t_q2, $t_q3, $t_q4, $t_q5, $t_comment, 
                        $c_q1, $c_q2, $c_q3, $c_q4, $c_q5, $c_comment) {
               //echo $t_q1 . " " . $c_q1;
               //die();            
   rateTeacher($pdo, $s_id, $t_id, $c_id, $t_gen, $t_q1, $t_q2, $t_q3, $t_q4, $t_q5, $t_comment);
   rateCourse($pdo, $s_id, $t_id, $c_id, $c_gen, $c_q1, $c_q2, $c_q3, $c_q4, $c_q5, $c_comment);
   //die();
   }
   function rateTeacher($pdo, $s_id, $t_id, $c_id, $gen, $q1, $q2, $q3, $q4, $q5, $comment) {
      
      $comment = htmlentities($comment);
      
      $query = "SELECT * FROM teacher_rating WHERE student_id=:student_id";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':student_id', $s_id);
      $stmt->execute();
      
      if($stmt->fetch(PDO::FETCH_ASSOC)) {
         $query = "UPDATE teacher_rating SET teacher_rating_active = 0 WHERE student_id = :student_id AND teacher_id = :t_id";
         $stmt = $pdo->prepare($query);
         $stmt->bindParam(':student_id', $s_id);
         $stmt->bindParam(':t_id', $t_id);
         $stmt->execute();
      }

      $query = "INSERT INTO teacher_rating (teacher_id, student_id, rating, teacher_question_one, teacher_question_two, teacher_question_three, teacher_question_four, teacher_question_five, comment, teacher_course_id, rating_date) 
                                    VALUES (:t_id, :s_id, :rate, :q1, :q2, :q3, :q4, :q5, :comment, :c_id, now())";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':t_id', $t_id);
      $stmt->bindParam(':s_id', $s_id);
      $stmt->bindParam(':rate', $gen);
      $stmt->bindParam(':q1', $q1);
      $stmt->bindParam(':q2', $q2);
      $stmt->bindParam(':q3', $q3);
      $stmt->bindParam(':q4', $q4);
      $stmt->bindParam(':q5', $q5);
      $stmt->bindParam(':comment', $comment);
      $stmt->bindParam(':c_id', $c_id);
      $stmt->execute();
   }
   
   function rateCourse($pdo, $s_id, $t_id, $c_id, $gen, $q1, $q2, $q3, $q4, $q5, $comment) {
      $comment = htmlentities($comment);
      
      $query = "SELECT * FROM course_rating WHERE student_id=:student_id";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':student_id', $s_id);
      $stmt->execute();
      
      if($stmt->fetch(PDO::FETCH_ASSOC)) {
         $query = "UPDATE course_rating SET course_rating_active = 0 WHERE student_id = :student_id AND course_id = :c_id";
         $stmt = $pdo->prepare($query);
         $stmt->bindParam(':student_id', $s_id);
         $stmt->bindParam(':c_id', $c_id);
         $stmt->execute();
      }
      
      $query = "INSERT INTO course_rating (course_id, student_id, rating, course_question_one, course_question_two, course_question_three, course_question_four, course_question_five, comment, course_teacher_id, rating_date) 
                                   VALUES (:c_id, :s_id, :rate, :q1, :q2, :q3, :q4, :q5, :comment, :t_id, now())";
      $stmt = $pdo->prepare($query);
      $stmt->bindParam(':c_id', $c_id);
      $stmt->bindParam(':s_id', $s_id);
      $stmt->bindParam(':rate', $gen);
      $stmt->bindParam(':q1', $q1);
      $stmt->bindParam(':q2', $q2);
      $stmt->bindParam(':q3', $q3);
      $stmt->bindParam(':q4', $q4);
      $stmt->bindParam(':q5', $q5);
      $stmt->bindParam(':comment', $comment);
      $stmt->bindParam(':t_id', $t_id);
      $stmt->execute();
   }

?>