const nodemailer = require('nodemailer');

module.exports = async (req, res) => {
  if (req.method !== 'POST') {
    res.status(405).json({ error: 'Method not allowed' });
    return;
  }

  const { name, email, phone, city, idol_type, size } = req.body;

  // Configure your SMTP transport with the provided Gmail app password
  const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'ssuryabackup@gmail.com', // sender email
      pass: 'snhc gfuv nust ekeu' // Gmail app password
    }
  });

  const mailOptions = {
    from: email,
    to: 'ssuryabackup@gmail.com',
    subject: `New Ganesh Chaturthi 2025 Prebooking from ${name}`,
    text: `You have received a new Ganesh Chaturthi 2025 prebooking.\n\nName: ${name}\nEmail: ${email}\nPhone: ${phone}\nCity: ${city}\nIdol Type: ${idol_type}\nSize: ${size}`
  };

  try {
    await transporter.sendMail(mailOptions);
    res.status(200).json({ success: true, message: 'Prebooking submitted successfully!' });
  } catch (error) {
    res.status(500).json({ success: false, message: 'Error sending email', error: error.message });
  }
}; 