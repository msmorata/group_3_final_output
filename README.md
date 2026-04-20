# Group 3 - Inventory and Sales System (Final Output)

## Team Members
* Baricanosa
* Breis
* Gecale
* Lucero
* Manaig
* Morata
* Payawal

## 🔐 API Key Authentication

This RESTful API is strictly secured using custom middleware. To protect the database from unauthorized access, all incoming traffic is intercepted and verified before any data is returned. 

### How to Authenticate
To successfully connect to the API, you must include the designated secret key in the **Headers** of every HTTP request. 

**Required Headers:**
* **`x-api-key`**: `group3-secret-key`
* **`Accept`**: `application/json`

---

### Testing via Postman
When demonstrating the security flow, follow these steps:

1. Open Postman and set the request method to **GET**.
2. Enter the target endpoint URL (e.g., `http://127.0.0.1:8000/api/analytics/products`).
3. Navigate to the **Headers** tab below the URL bar.
4. Input `x-api-key` in the Key column and `group3-secret-key` in the Value column.
5. Hit **Send**.

---

### Security Responses

**✅ Authorized Access (Status: 200 OK)**
When the correct header is provided, the middleware allows the request to pass through to the controller, returning the requested PostgreSQL data in JSON format.

**❌ Unauthorized Access (Status: 401 Unauthorized)**
If a user attempts to fetch data without the `x-api-key` header, or if the provided key is incorrect, the server instantly drops the connection and returns the following JSON error:

```json
{
    "message": "Unauthorized. Invalid or missing API Key."
}