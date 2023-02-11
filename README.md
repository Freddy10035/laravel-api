# Introduction

This API is built using Laravel, a PHP web application framework, and allows for managing invoices and customers data. The API supports basic filtering and pagination operations for customers and invoices data.
## Endpoints

The API has two main endpoints:

`/api/v1/customers` for managing customers data.
`/api/v1/invoices` for managing invoices data.

## Filtering

The API supports basic filtering operations, such as equal to, greater than, and less than, for both customers and invoices data. For example, to get all invoices with a status that is not equal to P, the following URL can be used: `/api/v1/invoices?status[ne]=P`. The supported filter operations and their corresponding query parameters can be found in the CustomersFilter.php and InvoicesFilter.php files.
## Pagination

The API supports pagination for both customers and invoices data. The default page size is set to 15 items, but it can be changed by passing the per_page query parameter in the API request. 
For example, to get the second page of customers data with a page size of 10 items, the following URL can be used:  `/api/v1/customers?page=2&per_page=10.`
## Conclusion

This API provides a basic platform for managing invoices and customers data, and supports basic filtering and pagination operations. The API can be extended to add more advanced features and customizations as needed.