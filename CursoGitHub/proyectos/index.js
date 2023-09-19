//este metodo sirve para catgar informacion de la app

async function getData(){
    try {
        
        const response = await fetch("https://rickandmortyapi.com/api/character")
        console.log(response)
        const data = await response.json()
        console.log(data)
        data.results.forEach(Element =>{
                const article = document.createRange().createContextualFragment(`

                    <article>
                    <div class="image-container">
                    <img src="${Element.image}"></img>
                    <div>
                    <h2>${Element.name}</h2>
                    <spn>${Element.status}</span>
                    </div>
                    </article>
                `)
                
                const main = document.querySelector("main")
                main.append(article)
        })
    } catch (error) {
        console.log(`Ha ocurrido un error en la peticion ${error}`)
    }
}

getData()