const express = require('express');
const bodyParser = require('body-parser');
const mongoose = require('mongoose');

const app = express();
const PORT = 3000;

// Connect to MongoDB
mongoose.connect('mongodb://localhost:27017/candidatesDB', { useNewUrlParser: true, useUnifiedTopology: true });

// Create a schema for candidates
const candidateSchema = new mongoose.Schema({
  name: String,
  votes: { type: Number, default: 0 },
});

const Candidate = mongoose.model('Candidate', candidateSchema);

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));

// API endpoint to get candidates
app.get('/api/candidates', async (req, res) => {
  try {
    const candidates = await Candidate.find();
    res.json(candidates);
  } catch (error) {
    res.status(500).send('Internal Server Error');
  }
});

// API endpoint to vote for a candidate
app.post('/api/vote', async (req, res) => {
  const candidateName = req.body.candidateName;

  try {
    const candidate = await Candidate.findOne({ name: candidateName });
    if (candidate) {
      candidate.votes++;
      await candidate.save();
      res.json({ success: true });
    } else {
      res.status(404).json({ success: false, message: 'Candidate not found' });
    }
  } catch (error) {
    res.status(500).send('Internal Server Error');
  }
});

app.listen(PORT, () => {
  console.log(`Server is running on http://localhost:${PORT}`);
});
