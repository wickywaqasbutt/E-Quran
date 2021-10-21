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

                  question: "is internet is compolsary for this website /کیا انٹرنیٹ اس ویب سائٹ کے لئے تالیف دہ ہے؟(Set 1)",
                  answers: {
                    a: "yes",
                    b: "no",
                    c: "i don't no"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "which things you required to use this website?/جن چیزوں کی آپ کو اس ویب سائٹ کو استعمال کرنے کی ضرورت ہے ",
                  answers: {
                    a: "internet, web browser, laptop or pc",
                    b: "headset, webcam, silent room",
                    c: "both a and b"
                  },
                  correctAnswer: "c"
                },
                {
                  question: "how much minimunm internet speed require to use this website/اس ویب سائٹ کو استعمال کرنے کے لئے کم سے کم انٹرنیٹ اسپیڈ کی ضرورت ہوتی ہے ",
                  answers: {
                    a: "2mbps",
                    b: "4mbps",
                    c: "10mbps",
                    d: "no speed require"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "what is tajweed?/تجاوید اور ترتیل میں کیا فرق ہے؟",
                  answers: {
                    a: " recite quran",
                    b: "how to translate",
                    c: "read quran  with a set of rules for the correct pronunciation",
                    d: "non of above"
                  },
                  correctAnswer: "c"
                },
                {
                  question: "What is the difference between tajweed and Tarteel?",
                  answers: {
                    a: "no difference ",
                    b: "Tajweed is the science of the rules of recitation of the Quran. Tarteel means reading as the Prophet (PBUH) used to recite and as he was ordered to by Allah.A",
                    c: "Terteel is the science of the rules of recitation of the Quran. Tajweed means reading as the Prophet (PBUH) used to recite and as he was ordered to by Allah.A",
                    d: "non of above"
                  },
                  correctAnswer: "d"
                },
                {
                  question: "What is Hafs an Asim?/حفص ایک عاصم کیا ہے؟",
                  answers: {
                    a: " Hafs 'an 'Asim tradition which represents the recitational tradition of Kufa, ",
                    b: "maqamat",
                    c: "mazils",
                    d: "non of above"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "e quran student require what type of impression/ ای قران طالب علم کس طرح کے تاثر کی ضرورت ہوتی ہے",
                  answers: {
                    a: "leanered and fully confidence",
                    b: "angry and harsh",
                    c: "shy",
                    d: " anxiety"
                  },
                  correctAnswer: "d"
                },
                {
                  question: "Teacher  should be panctual/اساتذہ کو پابند ہونا چاہئے",
                  answers: {
                    a: "True",
                    b: "false",
                    c: "i dont know",
                    
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