function validateBlog(event){
    event.preventDefault();
    const form = document.getElementById("blogform");
    const title = document.getElementById("title");
    const description = document.getElementById("description");

    let error = false;

    document.getElementById("title-error").innerHTML= ""
    document.getElementById("description-error").innerHTML= "";

    if (!title.value){
        error = true;
        document.getElementById("title-error").innerHTML= "Title is required";
    }

    if (!description.value){
        error = true;
        document.getElementById("description-error").innerHTML= "Description is required";
    }

    if (!error){
       form.submit();
    }
}


document.getElementById("blogform").addEventListener("submit", validateBlog);
