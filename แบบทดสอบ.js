const examData = [
    {exam: "1. 1+1 = ?",a: "1",b: "2",c: "3",d: "4",correct:"a"},
    {exam: "2. 20+1 = ?",a: "1",b: "2",c: "3",d: "4",correct:"a"},
    {exam: "3. 21+1 = ?",a: "1",b: "2",c: "3",d: "4",correct:"a"},
    {exam: "4. 211 = ?",a: "1",b: "2",c: "3",d: "4",correct:"a"},
    {exam: "5. 111 = ?",a: "1",b: "2",c: "3",d: "4",correct:"a"},
    {exam: "6. 5555 = ?",a: "1",b: "2",c: "3",d: "4",correct:"a"},
]
let examContainer = document.querySelector(".exam-container")
let examHead = document.getElementById("exam-header")
let examEl = document.getElementById("exam")
let answerEls = document.querySelectorAll(".answer")
let choiceA = document.getElementById("a-text")
let choiceB = document.getElementById("b-text")
let choiceC = document.getElementById("c-text")
let choiceD = document.getElementById("d-text")
let submitBtn = document.getElementById("submit")

let score = 0
let currentExam = 0
loadExam()

function loadExam(){
answerEls.forEach(answerEl =>answerEl.checked=false)
let currentExamData = examData[currentExam]
examHead.innerHTML = "ป้ายจรจร"
examEl.innerHTML = currentExamData.exam
choiceA.innerHTML = currentExamData.a
choiceB.innerHTML = currentExamData.b
choiceC.innerHTML = currentExamData.c
choiceD.innerHTML = currentExamData.d
}
submitBtn.addEventListener('click',()=>{
    let answer = checkChoiceAnswer()
if(answer){
        if(answer === examData[currentExam].correct){
                score++
        }
}
    currentExam++
    if(currentExam<examData.length){
        loadExam()
    }else{
        examContainer.innerHTML = "<center><h2>เสร็จแล้ว <br>คุณได้ "+score+"/20  คะแนน</h2></center><button type=\"submit\" onclick=\"refresh()\">สอบใหม่</button>"
    }
})


function checkChoiceAnswer(){
    let answer
    answerEls.forEach(answerEl=>{
        if(answerEl.checked){
            answer = answerEl.id

        }
    })
    return answer
}
function refresh(){
    location.reload();
}