<?php
include 'database/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $conn->real_escape_string($_POST['title']);
    $link = $conn->real_escape_string($_POST['link']);
    $description = $conn->real_escape_string($_POST['description']);

    // File upload
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . time() . "_" . $fileName;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        $sql = "INSERT INTO projects (title, link, description, image) 
                VALUES ('$title', '$link', '$description', '$targetFilePath')";
        if ($conn->query($sql)) {
            echo "<script>alert('Project uploaded successfully!');</script>";
        } else {
            echo "<script>alert('DB Error: " . addslashes($conn->error) . "');</script>";
        }
    } else {
        echo "<script>alert('File upload failed.');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Project</title>
</head>
<body>
    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 420px;
            margin: 60px auto;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.08);
            padding: 36px 32px 28px 32px;
        }
        h2 {
            text-align: center;
            color: #2d3e50;
            margin-bottom: 28px;
            font-weight: 600;
            letter-spacing: 1px;
        }
        label {
            display: block;
            margin-bottom: 7px;
            color: #34495e;
            font-size: 15px;
            font-weight: 500;
        }
        input[type="text"],
        input[type="url"],
        textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #dbe2ea;
            border-radius: 6px;
            background: #f9fafb;
            font-size: 15px;
            margin-bottom: 18px;
            transition: border 0.2s;
        }
        input[type="text"]:focus,
        input[type="url"]:focus,
        textarea:focus {
            border-color: #5b9df9;
            outline: none;
            background: #fff;
        }
        textarea {
            min-height: 70px;
            resize: vertical;
        }
        input[type="file"] {
            margin-bottom: 18px;
            font-size: 15px;
        }
        button[type="submit"] {
            width: 100%;
            background: linear-gradient(90deg, #5b9df9 0%, #3b82f6 100%);
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 12px 0;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(91,157,249,0.08);
            margin-top: 10px;
        }
        button[type="submit"]:hover {
            background: linear-gradient(90deg, #3b82f6 0%, #2563eb 100%);
        }
        @media (max-width: 500px) {
            .container {
                padding: 20px 8px 18px 8px;
            }
        }
    </style>
    <div class="container">
        <h2>Upload New Project</h2>
        <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>

            <label for="link">Link</label>
            <input type="url" name="link" id="link" required>

            <label for="description">type (website or mobile app</label>
            <textarea name="description" id="description" required></textarea>

            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/*" required>

            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>
