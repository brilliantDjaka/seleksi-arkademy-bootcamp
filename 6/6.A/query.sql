SELECT cashier.name as cashier, product.name as product, category.name as category, product.price as price 
FROM product 
LEFT JOIN cashier ON product.id_cashier = cashier.id
LEFT JOIN category ON product.id_category = category.id