const express = require('express');
const { google } = require('googleapis');
const multer = require('multer');

const app = express();

// Configure Google Drive API credentials
const auth = new google.auth.GoogleAuth({
  keyFile: 'path_to_service_account_key.json', // Replace with your service account key file
  scopes: ['https://www.googleapis.com/auth/drive'],
});

const drive = google.drive({ version: 'v3', auth });

// Multer configuration for file upload
const storage = multer.memoryStorage();
const upload = multer({ storage: storage });

// File upload route
app.post('/upload', upload.single('file'), async (req, res) => {
  const file = req.file;

  if (!file) {
    res.status(400).send('No file uploaded.');
    return;
  }

  try {
    const response = await drive.files.create({
      requestBody: {
        name: file.originalname,
        mimeType: file.mimetype,
      },
      media: {
        mimeType: file.mimetype,
        body: file.buffer,
      },
    });

    console.log('File uploaded:', response.data);
    res.status(200).send('File uploaded successfully to Google Drive!');
  } catch (error) {
    console.error('Error uploading file:', error);
    res.status(500).send('Error uploading file to Google Drive.');
  }
});

// Serve the HTML file
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/upload.html');
});

// Start server
const PORT = 3000;
app.listen(PORT, () => {
  console.log(`Server running on port ${PORT}`);
});
