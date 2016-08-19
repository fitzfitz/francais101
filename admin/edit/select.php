<?php  
 include ('../../config/db.config.php');
 $output = '';  
 $query = mysql_query("SELECT * FROM fr_post INNER JOIN fr_lesson_cat ON fr_post.id_Lesson = fr_lesson_cat.id_Lesson WHERE fr_lesson_cat.id_cat='CAT001' ORDER BY id_post ASC");  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="10%">Id</th>  
                     <th width="40%">First Name</th> 
                     <th width="10%">id_Lesson</th>   
                     <th width="10%">Delete</th>  
                </tr>';  
 if(mysql_num_rows($query) > 0)  
 {  
      while($row = mysql_fetch_array($query))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id_post"].'</td>  
                     <td class="article" data-id1="'.$row["id_post"].'" contenteditable>'.$row["article"].'</td> 
                     <td class="id_Lesson" data-id1="'.$row["id_post"].'" contenteditable>'.$row["id_Lesson"].'</td>  
                     <td><button type="button" name="delete_btn" data-id3="'.$row["id_post"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="article" contenteditable></td>
                <td id="lessonid" contenteditable></td> 
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?> 