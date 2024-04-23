<?php
    include('conn.php');
    session_start();

    if(!isset($_SESSION['user']))
    {
        header("location:login.php");
    }
    include 'navbar.php'; 

?>
<?php include 'header.php'; ?>

<section class="section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 text-center">
                <h3 class="mb-4">Comprehensive Question Paper</h3>
            </div>
            
            <div class="col-lg-8 col-12 mt-3 mx-auto">
                <?php
                    // Dummy questions
                    $questions = array(
                        array(
                            "question_text" => "What is the capital of France?",
                            "options" => array("Paris", "London", "Berlin", "Rome"),
                            "correct_option" => 1
                        ),
                        array(
                            "question_text" => "Which planet is known as the Red Planet?",
                            "options" => array("Earth", "Mars", "Jupiter", "Saturn"),
                            "correct_option" => 2
                        ),
                        array(
                            "question_text" => "What is the chemical symbol for water?",
                            "options" => array("O", "H", "W", "H2O"),
                            "correct_option" => 4
                        )
                    );
                    
                    $question_number = 1;
                    foreach ($questions as $question) {
                        $question_text = $question["question_text"];
                        $options = $question["options"];
                        
                        echo "<div class='card mb-4'>";
                        echo "<div class='card-body'>";
                        echo "<h5 class='card-title'>Question $question_number</h5>";
                        echo "<p class='card-text'>$question_text</p>";
                        foreach ($options as $key => $option) {
                            echo "<div class='form-check'>";
                            echo "<input class='form-check-input' type='radio' name='answer$question_number' id='option$question_number$key' value='" . ($key + 1) . "'>";
                            echo "<label class='form-check-label' for='option$question_number$key'>$option</label>";
                            echo "</div>";
                        }
                        echo "</div>";
                        echo "</div>";
                        
                        $question_number++;
                    }
                ?>
                <button class="btn btn-primary float-end">End Test</button>
            </div>
        </div>
    </div>
</section>

<?php
    include 'footer.php';
?>
