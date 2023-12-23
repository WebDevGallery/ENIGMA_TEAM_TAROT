const nodemailer = require('nodemailer');
const mysql = require('mysql');
const { DateTime } = require('luxon');
const prompt = require('prompt-sync')(); // Added for getting user input

const db_config = {
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'enigma'
};

const email_config = {
    sender_email: 'testy.testy0403@gmail.com',
    sender_password: 'rkvdkognzhoclvks',
    smtp_server: 'smtp.gmail.com',
    smtp_port: 587
};

function send_email(recipient_email, subject, body) {
    const transporter = nodemailer.createTransport({
        service: 'gmail',
        auth: {
            user: email_config.sender_email,
            pass: email_config.sender_password
        }
    });

    const mailOptions = {
        from: email_config.sender_email,
        to: recipient_email,
        subject: subject,
        text: body
    };

    transporter.sendMail(mailOptions, function(error, info) {
        if (error) {
            console.log(error);
        } else {
            console.log('Email sent: ' + info.response);
        }
    });
}

function notify_students(class_start_time, recipient_email) {
    const current_time = DateTime.now();
    const time_difference = class_start_time.diff(current_time, 'minutes');

    if (time_difference >= 0 && time_difference <= 5) {
        const subject = prompt("Enter the Subject of the Alert: ");
        const body = prompt("\nEnter the Alert message:\n");
        send_email(recipient_email, subject, body);
    }
}

function main() {
    const conn = mysql.createConnection(db_config);

    conn.connect(function(err) {
        if (err) {
            console.error('Error connecting to the database: ' + err.stack);
            return;
        }

        console.log('Connected to the database.');

        conn.query('SELECT email, start FROM class', function(err, rows) {
            if (err) {
                console.error('Error executing query: ' + err.stack);
                return;
            }

            rows.forEach(function(row) {
                const recipient_email = row.email;
                const class_start_time = DateTime.fromJSDate(row.start);

                notify_students(class_start_time, recipient_email);
            });

            conn.end(function(err) {
                if (err) {
                    console.error('Error closing database connection: ' + err.stack);
                    return;
                }

                console.log('Database connection closed.');
            });
        });
    });
}

main();