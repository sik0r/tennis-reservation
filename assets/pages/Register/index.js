import React, {useState} from "react";
import {useFormik} from 'formik';
import {Alert, Button, Col, Form, FormFeedback, FormGroup, Input, Label, Row} from "reactstrap";
import registerValidator from "../../validators/register";
import axios from "axios";

const Register = () => {
    const [showAlert, setShowAlert] = useState(false);
    const initialValues = {
        username: '',
        email: '',
        password: '',
        confirmPassword: ''
    };

    const formik = useFormik({
        initialValues: initialValues,
        onSubmit: async (values, actions) => {
            const response = await axios.post('/api/players', JSON.stringify(values), {
                headers: {
                    'content-type': 'application/json'
                }
            }).then(res => {
                actions.setSubmitting(false);
                actions.resetForm();
            }).catch(e => {
                actions.setSubmitting(false);
                setErrors(e.response.data.errors)
            });

            if (response.status === 201) {
                setShowAlert(true);
            }
        },
        validationSchema: registerValidator,
        initialErrors: initialValues
    })

    const setErrors = (errors) => {
        const mappedErrors = [];
        errors.forEach(value => {
            mappedErrors[value.propertyPath] = value.message;
        });

        formik.setErrors(mappedErrors);
    }

    return (
        <>
            <Alert
                dismissible
                variant="success"
                isOpen={showAlert}
                onClose={() => setShowAlert(false)}>
                Pomyślnie utworzono konto
            </Alert>
            <Row>
                <Col sm="12" md={{size: 8, offset: 2}}>
                    <Form onSubmit={formik.handleSubmit}>
                        <FormGroup>
                            <Label for="email">Email</Label>
                            <Input
                                type="email"
                                id="email"
                                name="email"
                                value={formik.values.email}
                                onChange={formik.handleChange}
                                onBlur={formik.handleBlur}
                                valid={Boolean(!formik.errors.email && formik.touched.email)}
                                invalid={Boolean(formik.errors.email && formik.touched.email)}/>
                            <FormFeedback>{formik.errors.email}</FormFeedback>
                        </FormGroup>
                        <FormGroup>
                            <Label for="username">Nazwa użytkownika</Label>
                            <Input
                                type="username"
                                id="username"
                                name="username"
                                value={formik.values.username}
                                onChange={formik.handleChange}
                                onBlur={formik.handleBlur}
                                valid={Boolean(!formik.errors.username && formik.touched.username)}
                                invalid={Boolean(formik.errors.username && formik.touched.username)}/>
                            <FormFeedback>{formik.errors.username}</FormFeedback>
                        </FormGroup>
                        <FormGroup>
                            <Label for="username">Hasło</Label>
                            <Input
                                type="password"
                                id="password"
                                name="password"
                                value={formik.values.password}
                                onChange={formik.handleChange}
                                onBlur={formik.handleBlur}
                                valid={Boolean(!formik.errors.password && formik.touched.password)}
                                invalid={Boolean(formik.errors.password && formik.touched.password)}/>
                            <FormFeedback>{formik.errors.password}</FormFeedback>
                        </FormGroup>
                        <FormGroup>
                            <Label for="username">Potwierdź hasło</Label>
                            <Input
                                type="password"
                                id="confirmPassword"
                                name="confirmPassword"
                                value={formik.values.confirmPassword}
                                onChange={formik.handleChange}
                                onBlur={formik.handleBlur}
                                valid={Boolean(!formik.errors.confirmPassword && formik.touched.confirmPassword)}
                                invalid={Boolean(formik.errors.confirmPassword && formik.touched.confirmPassword)}/>
                            <FormFeedback>{formik.errors.confirmPassword}</FormFeedback>
                        </FormGroup>
                        <Button type="submit">Zarejestruj</Button>
                    </Form>
                </Col>
            </Row>
        </>
    );
}

export default Register;