const botlog = document.querySelector(".btn")
const sou = document.querySelector(".sou").value
const linkp = document.querySelector(".linkp")
console.log(linkp)
botlog.addEventListener("click", ()=>{
    console.log("funfo")
function envair(){


    if(sou == "aluno"){
        open("alunos.php")
    }else if(sou == "professor"){
        open("professores.php")
    }else if(sou == "Coordenacao"){
        open("coordecao.php")
    }else if(sou == "Gestor"){
        open("gestao.php")
    }
}
})