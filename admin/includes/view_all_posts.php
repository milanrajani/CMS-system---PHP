<table class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <!-- <th>Image</th> -->
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                    <th>View Post</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Views</th>
                                     
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $query = "SELECT * FROM posts";
                            $select_posts = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_assoc($select_posts)){
                                $post_id = $row['post_id'];
                                $post_author = $row['post_author'];
                                $post_title = $row['post_title'];
                                $post_category_id = $row['post_category_id'];
                                $post_status = $row['post_status'];
                                // $post_image = $row['post_image'];
                                $post_tags = $row['post_tags'];
                                $post_comment = $row['post_comment_count'];
                                $post_date = $row['post_date'];
                                $post_views_count = $row['post_views_count'];

                                echo "<tr?>";
                                echo "<td>{$post_id}</td>";
                                echo "<td>{$post_author}</td>";
                                echo "<td>{$post_title}</td>";

                                $query = "SELECT * FROM category WHERE cat_id =  {$post_category_id} ";
                                $select_category_id = mysqli_query($connection, $query);
                                  
                                 while($row = mysqli_fetch_assoc($select_category_id)){
                                    $cat_id = $row['cat_id'];
                                    $cat_title = $row['cat_title'];
                                 }

                                // echo "<td>{$cat_title}</td>";
 
                                echo "<td>{$post_status}</td>";

                                echo "<td>{$post_tags}</td>";
                                echo "<td>{$post_comment}</td>";
                                echo "<td>{$post_date}</td>";
                                echo "<td><a href='../post.php?p_id={$post_id}'  >View Post</a></td>";
                                echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'  >Edit</a></td>";
                                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete') \" href='posts.php?delete={$post_id}'  >Delete</a></td>";
                                echo "<td><a href='posts.php?reset={$post_id}'>$post_views_count</td>";
                                echo "</tr>";
                            }
                            
                            
                            
                            
                            ?>
                                
                               
                            </tbody>
                        </table>


<?php
if(isset($_GET['delete'])){

 $the_post_id = $_GET['delete'];

 $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
 $delete_query = mysqli_query($connection, $query);
 header("Location: posts.php");

}
if(isset($_GET['reset'])){

 $the_post_id = $_GET['reset'];

 $query = "UPDATE posts SET post_views_count = 0 WHERE post_id =" . mysqli_real_escape_string($connection, $_GET['reset']) . " ";
 $reset_query = mysqli_query($connection, $query);
 header("Location: posts.php");

}



?>