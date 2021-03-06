

            $this->form_validation->set_rules("doctor_email", "Email-ID", "trim|required|valid_email|is_unique[login.email]");
            $this->form_validation->set_rules("first_name", "First Name", "trim|required|alpha_numeric|xss_clean|min_length[4]");
            $this->form_validation->set_rules("last_name", "Last Name", "trim|required|alpha_numeric|xss_clean|min_length[4]");
            $this->form_validation->set_rules("state", "State", "trim|required");
            $this->form_validation->set_rules("dob", "Date Of birth", "trim|required");
            $this->form_validation->set_rules("city", "City", "trim|required");
            $this->form_validation->set_rules("gender", "Gender", "trim|required");
            $this->form_validation->set_rules("gender", "Gender", "trim|required");
            $this->form_validation->set_rules("country", "Country", "trim|required");
            $this->form_validation->set_rules("pincode", "Pincode", "trim|numeric|required|min_length[6]|max_length[6]");
            $this->form_validation->set_rules("mobile_no", "mobile", "trim|numeric|required|min_length[10]|max_length[10]");
            $this->form_validation->set_rules("phone_no", "phone", "trim|numeric|min_length[12]|max_length[12]");
            $this->form_validation->set_rules("password", "password", "trim|required|alpha_numeric|min_length[8]");
            $this->form_validation->set_rules("cpassword", "cpassword", "trim|matches[password]");
 
        if ($this->form_validation->run() == FALSE)
            {
                $this->output->set_status_header('400'); //Triggers the jQuery error callback
                $this->data['message'] = validation_errors();
                echo json_encode($this->data);
            }
