import * as Yup from "yup";

const registerValidator = Yup.object().shape({
    email: Yup.string()
        .email('Nieprawidłowy adres e-mail')
        .max(255, 'Maxymalna ilość znaków to 255')
        .required('Adres e-mail jest wymagany'),
    username: Yup.string()
        .min(3, 'Minimalna ilość znaków to 3')
        .max(20, 'Maxymalna ilość znaków to 20')
        .required(),
    password: Yup.string()
        .min(8, 'Minimalna ilość znaków to 8')
        .max(50, 'Maxymalna ilość znaków to 50')
        .matches('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\\$%\\^&\\*])(?=.{8,50})', 'Hasło musi posiadać: mała i duża litere, cyfrę oraz znak specjalny: !@#$%^&*')
        .required('Hasło jest wymagane'),
    confirmPassword: Yup.string()
        .oneOf([Yup.ref('password')], 'Hasła muszą być identyczne')
        .required(),
});

export default registerValidator;
