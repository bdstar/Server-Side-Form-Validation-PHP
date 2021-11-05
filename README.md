# Registration Form Server Side validation using PHP

In this article, I am trying to present basic HTML form elements and how their data is accessible and processed by the PHP scripts. It is very essential to have the input to your form validated before taking the form submission data for further processing.

Client-side form validations help in giving immediate feedback to the user but it is also required to add server-side form validation form to the processing script. The user can disable JavaScript on their server or even auto-bots might try to submit your form as well. The server-side form validations help keep the form submission data consistent and it also helps in lesser server-side errors.

<p> The form contains a number of inputs: text fields, radio buttons, select list, a checkbox, and a submit button. These inputs will be validated to ensure that the user has entered their input is correct and any errors or omissions will be highlighted with a message alongside the relevant field. 

## Installation

Clone the project from the Github repository and run your Webserver. Open the project the to web browser. 

## Form Creation
Here I have created a simple Registration Form that has input field Name, Email, Password, Address, Country, phone, comment, and a web address field that is enabled by the clicking Yes radio button and also a Agree with checkbox and at last a submit button. On the right side of each input field, a warning box is placed where PHP field error will be thrown.

![Form Creation](https://raw.githubusercontent.com/bdstar/Server-Side-Form-Validation-PHP/main/images/form_validation.png)

## Conclusion
Validation is essential, particularly if you are going to save the data in a database. In this article, I am trying to present how to create a simple HTML form and validate it with PHP. Along the way, a number of techniques have been used to re-display user input and display error messages. So after getting the fresh data you can do any desired operation with those data. So keep going and Have better coding...

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)