1. Project Management
Full CRUD (Create, Read, Update, Delete) operations for managing project portfolios.

Fields: Project Name, Company Name, Designation, Project Link, and Description.

2. User Authentication & Profile
Register: Create a new user account.

Login: Secure authentication with JWT or Session-based tokens.

Update Profile: Modify user details and account settings.

3. Data Integration
URL Import: Fetch and parse data directly from an external JSON/CSV link.

Form Import: Upload or paste bulk data directly through a standard form.

4. API Endpoints
The system provides two primary ways to access data:

Public API: Fetch project data from the database without requiring authentication.

Private API: * Requires a valid username and password.

Validation: Returns specific error messages for "User not found" or "Invalid password" to assist in debugging.
