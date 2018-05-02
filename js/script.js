//Visar signin eller registrera
let signIn = document.getElementById("signin");
let register = document.getElementById("register");
let errorMessage = document.getElementById("error-message");

function showSignIn() {
    register.style.display = "none";
    signIn.style.display = "block";
}
function showRegister() {
    register.style.display = "block";
    signIn.style.display = "none";
    errorMessage.style.display = "none";
}

//Visar inlägg eller skapa nytt inlägg
let createPost = document.getElementById("create-post");
let allPost = document.getElementById("post-wrapper");
let editPost = document.getElementById("edit-post");

function showAllPosts() {
    allPost.style.display = "block";
    createPost.style.display = "none";
    editPost.style.display = "none";
}
function showCreatePost() {
    createPost.style.display = "block";
    allPost.style.display = "none";
    editPost.style.display = "none";
}

//Visa formulär för att redigera samt fyller i formuläret
let editTitle = document.getElementById("edit-title");
let editContent = document.getElementById("edit-content");
let editEntryId = document.getElementById("entry-id");

function fillForm(entryId, entryTitle, entryContent) {
    editPost.style.display = "block";
    createPost.style.display = "none";
    allPost.style.display = "none";

    let content = entryContent;
    content = content.replace(/<br\/>/g, "\r\n");

    editEntryId.value = entryId;
    editTitle.value = entryTitle;
    editContent.value = content;
}
