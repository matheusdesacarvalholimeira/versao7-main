
const btn = document.querySelector(".apare");
console.log(btn);

btn.addEventListener("click", () => {
    console.log("Funcionou");
    document.querySelector('.esconder').style.display = 'block'
});


const fechar = document.querySelector(".btn-close")
console.log(fechar)

fechar.addEventListener("click", ()=>{
    document.querySelector('.esconder').style.display = 'none'
})

let dific = document.querySelector('.add_dif')
      
dific.addEventListener("click", ()=>{
 
  if(document.querySelector('.niveis').style.display == 'none'){
    document.querySelector('.niveis').style.display = 'block'
    document.querySelector('.niveis').style.display = 'Flex'
  }else{
    document.querySelector('.niveis').style.display = 'none'
  }
})