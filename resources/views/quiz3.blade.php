<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
        body{
            font-size: 20px;
            font-family: sans-serif;
            color: #333;
        }
        .question{
            font-weight: 600;
        }
        .answers {
          margin-bottom: 20px;
        }
        .answers label{
          display: block;
        }
        #submit{
            font-family: sans-serif;
            font-size: 20px;
            background-color: #279;
            color: #fff;
            border: 0px;
            border-radius: 3px;
            padding: 20px;
            cursor: pointer;
            margin-bottom: 20px;
        }
        #submit:hover{
            background-color: #38a;
        }
    </style>
</head>
<body>
    <form method="post" action="{{route('quizSubmit')}}">
    	@csrf
		<div id="quiz"></div>
		<button id="submit">Submit Quiz</button>
		<div id="results"></div>
		<input type="hidden" id="score" name="score" value="">
    </form>

    <script>
        (function(){
              function buildQuiz(){
                // variable to store the HTML output
                const output = [];

                // for each question...
                myQuestions.forEach(
                  (currentQuestion, questionNumber) => {

                    // variable to store the list of possible answers
                    const answers = [];

                    // and for each available answer...
                    for(letter in currentQuestion.answers){

                      // ...add an HTML radio button
                      answers.push(
                        `<label>
                          <input type="radio" name="question${questionNumber}" value="${letter}">
                          ${letter} :
                          ${currentQuestion.answers[letter]}
                        </label>`
                      );
                    }

                    // add this question and its answers to the output
                    output.push(
                      `<div class="question"> ${currentQuestion.question} </div>
                      <div class="answers"> ${answers.join('')} </div>`
                    );
                  }
                );

                // finally combine our output list into one string of HTML and put it on the page
                quizContainer.innerHTML = output.join('');
              }

              function showResults(){

                // gather answer containers from our quiz
                const answerContainers = quizContainer.querySelectorAll('.answers');

                // keep track of user's answers
                let numCorrect = 0;

                // for each question...
                myQuestions.forEach( (currentQuestion, questionNumber) => {

                  // find selected answer
                  const answerContainer = answerContainers[questionNumber];
                  const selector = `input[name=question${questionNumber}]:checked`;
                  const userAnswer = (answerContainer.querySelector(selector) || {}).value;

                  // if answer is correct
                  if(userAnswer === currentQuestion.correctAnswer){
                    // add to the number of correct answers
                    numCorrect++;

                    // color the answers green
                    answerContainers[questionNumber].style.color = 'lightgreen';
                  }
                  // if answer is wrong or blank
                  else{
                    // color the answers red
                    answerContainers[questionNumber].style.color = 'red';
                  }
                });

                // show number of correct answers out of total
                let res = numCorrect;

                resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
                document.getElementById('score').value = numCorrect;
              }

              const quizContainer = document.getElementById('quiz');
              const resultsContainer = document.getElementById('results');
              const submitButton = document.getElementById('submit');
              const myQuestions = [
                {
                  question: "what is ghunna? /غنا کیا ہے  (set 4)"
                  answers: {
                    a: " sound made entirely by the nose [nasal passage]",
                    b: "stop the sound",
                    c: "stop the sound but not breake the breath"
                  },
                  correctAnswer: "c"
                },
                {
                  question: "the student offer you teach me other platform ,what's your reaction?طالب علم پیش کرتا ہے کہ آپ مجھے دوسرے پلیٹ فارم سکھائیں ، آپ کا کیا رد عمل ہے",
                  answers: {
                    a: "agree",
                    b: "not agree",
                    c: "you say i'm loyal to equran"
                  },
                  correctAnswer: "c"
                },
                {
                  question: "you teach student?/ آپ طالب علم کو تعلیم دے سکتے ہی ",
                  answers: {
                    a: "after passing the interview by the admin",
                    b: "directly",
                    c: "after passing quiz ",
                    d: "none"
                  },
                  correctAnswer: "a"
                },
               
                 {
                  question: "what is ghunna? /غنا کیا ہے ",
                  answers: {
                    a: " sound made entirely by the nose [nasal passage]",
                    b: "stop the sound",
                    c: "stop the sound but not breake the breath"
                  },
                  correctAnswer: "c"
                },
                {
                  question: "the student offer you teach me other platform ,what's your reaction?طالب علم پیش کرتا ہے کہ آپ مجھے دوسرے پلیٹ فارم سکھائیں ، آپ کا کیا رد عمل ہے",
                  answers: {
                    a: "agree",
                    b: "not agree",
                    c: "you say i'm loyal to equran"
                  },
                  correctAnswer: "c"
                },
                {
                  question: "you teach student?/ آپ طالب علم کو تعلیم دے سکتے ہی ",
                  answers: {
                    a: "after passing the interview by the admin",
                    b: "directly",
                    c: "after passing quiz ",
                    d: "none"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "what is ghunna? /غنا کیا ہے ",
                  answers: {
                    a: " sound made entirely by the nose [nasal passage]",
                    b: "stop the sound",
                    c: "stop the sound but not breake the breath"
                  },
                  correctAnswer: "c"
                },
                {
                  question: "the student offer you teach me other platform ,what's your reaction?طالب علم پیش کرتا ہے کہ آپ مجھے دوسرے پلیٹ فارم سکھائیں ، آپ کا کیا رد عمل ہے",
                  answers: {
                    a: "agree",
                    b: "not agree",
                    c: "you say i'm loyal to equran"
                  },
                  correctAnswer: "c"
                },
                {
                  question: "you teach student?/ آپ طالب علم کو تعلیم دے سکتے ہی ",
                  answers: {
                    a: "after passing the interview by the admin",
                    b: "directly",
                    c: "after passing quiz ",
                    d: "none"
                  },
                  correctAnswer: "a"
                },
               
              ];

              // Kick things off
              buildQuiz();

              // Event listeners
              submitButton.addEventListener('click', showResults);
            })();
    </script>
</body>
</html>