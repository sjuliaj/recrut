<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Página do Administrador</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    h1 {
        text-align: center;
    }
    .container {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
    }
    button {
        padding: 5px 10px;
        margin: 5px;
    }
</style>
</head>
<body>
    <h1>Página do Administrador</h1>
    <div class="container">
        <h2>CRUD Operations</h2>
        <button id="createBtn">Create</button>
        <button id="readBtn">Read</button>
        <button id="updateBtn">Update</button>
        <button id="deleteBtn">Delete</button>
    </div>

    <script>
        const createBtn = document.getElementById("createBtn");
        const readBtn = document.getElementById("readBtn");
        const updateBtn = document.getElementById("updateBtn");
        const deleteBtn = document.getElementById("deleteBtn");

        createBtn.addEventListener("click", () => {
            alert("Create operation clicked!");
        });

        readBtn.addEventListener("click", () => {
            alert("Read operation clicked!");
        });

        updateBtn.addEventListener("click", () => {
            alert("Update operation clicked!");
        });

        deleteBtn.addEventListener("click", () => {
            alert("Delete operation clicked!");
        });
    </script>
</body>
</html>