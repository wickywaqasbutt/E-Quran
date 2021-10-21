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
                  question: "Why do we need to apply tajweed? / ہمیں تاجوید کیوں لگانے کی ضرورت ہے(Set 4)",
                  answers: {
                    a: "To recite beautifully",
                    b: "To show people when we recite that we understand tajweed",
                    c: "In order not to change the meaning of the Quran through improper recitation"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "If reading of the Qur'an is cut-off by talking to your friend or eating,then we need to repeat seeking of refuge? /اگر آپ کے دوست سے بات کرکے یا کھا کر قرآن کا مطالعہ کٹ جاتا ہے تو پھر ہمیں پناہ کی تلاش میں دہرانے کی ضرورت ہے",
                  answers: {
                    a: "true",
                    b: "false",
                    c: "i don't no"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "Which verse points us to do istiaathah?/ کیا آیت ہمیں استحکام کی طرف اشارہ کرتی ہے؟",
                  answers: {
                    a: "Naml(27):16",
                    b: "Faatiha(1):1",
                    c: "Ambiya (21):98",
                    d: "Nahl(16) :98"
                  },
                  correctAnswer: "d"
                },
                question: "Why do we need to apply tajweed? / ہمیں تاجوید کیوں لگانے کی ضرورت ہے",
                  answers: {
                    a: "To recite beautifully",
                    b: "To show people when we recite that we understand tajweed",
                    c: "In order not to change the meaning of the Quran through improper recitation"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "If reading of the Qur'an is cut-off by talking to your friend or eating,then we need to repeat seeking of refuge? /اگر آپ کے دوست سے بات کرکے یا کھا کر قرآن کا مطالعہ کٹ جاتا ہے تو پھر ہمیں پناہ کی تلاش میں دہرانے کی ضرورت ہے",
                  answers: {
                    a: "true",
                    b: "false",
                    c: "i don't no"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "Which verse points us to do istiaathah?/ کیا آیت ہمیں استحکام کی طرف اشارہ کرتی ہے؟",
                  answers: {
                    a: "Naml(27):16",
                    b: "Faatiha(1):1",
                    c: "Ambiya (21):98",
                    d: "Nahl(16) :98"
                  },
                  correctAnswer: "d"
                },
                question: "Why do we need to apply tajweed? / ہمیں تاجوید کیوں لگانے کی ضرورت ہے",
                  answers: {
                    a: "To recite beautifully",
                    b: "To show people when we recite that we understand tajweed",
                    c: "In order not to change the meaning of the Quran through improper recitation"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "If reading of the Qur'an is cut-off by talking to your friend or eating,then we need to repeat seeking of refuge? /اگر آپ کے دوست سے بات کرکے یا کھا کر قرآن کا مطالعہ کٹ جاتا ہے تو پھر ہمیں پناہ کی تلاش میں دہرانے کی ضرورت ہے",
                  answers: {
                    a: "true",
                    b: "false",
                    c: "i don't no"
                  },
                  correctAnswer: "a"
                },
                {
                  question: "Which verse points us to do istiaathah?/ کیا آیت ہمیں استحکام کی طرف اشارہ کرتی ہے؟",
                  answers: {
                    a: "Naml(27):16",
                    b: "Faatiha(1):1",
                    c: "Ambiya (21):98",
                    d: "Nahl(16) :98"
                  },
                  correctAnswer: "d"
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