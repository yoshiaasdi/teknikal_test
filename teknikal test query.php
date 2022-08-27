<?

1. Tampilkan seluruh data category name dan parent category name (Category Name, Parent Name)

	query="SELECT category_name, parent_category_id from category";
	
2. Tampilkan data customer dan usia nya yang pada tahun ini berusia di antara 30-40 tahun (Customer
Code, Customer Name, Address, Age)

	query="SELECT customer_code ,customer_name ,address,birth_date from (

				SELECT customer_code, customer_name,address,sum(2022-year(birth_date))as birth_date 
				from customer
				group by customer_code, customer_name,address

		   ) a where birth_date BETWEEN 30 and 40";

3. Tampilkan seluruh data customer beserta jumlah transaksi yang pernah dilakukan (Customer Code,
Customer Name, Total Transaksi)

	query="SELECT customer_code,customer_name,COUNT(customer_id) total_transaksi 
		   FROM customer a inner join so b on a.id=b.customer_id
		   GROUP BY customer_code,customer_name";

4. Tampilkan seluruh data product beserta nama kategorinya (product yang belum memiliki kategori
pun juga dltampilkan) (ld, Product Code, Product Name, Price, Kategori)

	query="SELECT a.id, product_code,product_name,price,b.category_name 
		  FROM product a left join category b on a.category_id=b.id";

5. Tampilkan data SO beserta total nilai nya (No SO, Customer Name, Transaction Date, Total amount)
	query="SELECT so_no, customer_name,trans_date, sum(qty*price) as total_amount
		   FROM so_detail a inner join so b on a.so_id=b.id
					inner join customer c on b.customer_id=c.id
		   GROUP BY so_no, customer_name,trans_date";

6. Tampilkan detail product yang paling laris (Product Code, Product Name, Total Terjual)
	query="SELECT * FROM (
			SELECT product_code,product_name,sum(qty)qty  
				FROM product a inner join so_detail b on a.id=b.product_id
				GROUP BY product_code,product_name
			) X WHERE qty=(SELECT max(qty) qty FROM (
				SELECT product_code,product_name,sum(qty)qty  
				FROM product a inner join so_detail b on a.id=b.product_id
				GROUP BY product_code,product_name) 
		   z )";	

7. Tampilkan 5 data customer teratas yang melakukan pembelian terbesar (Customer Code, Customer
Name, Total amount)

	query="SELECT top 5 customer_code, customer_name,d.product_name, sum(qty*a.price) as total_amount
			FROM so_detail a inner join so b on a.so_id=b.id
					inner join customer c on b.customer_id=c.id 
					inner JOIN product d  on d.id=a.product_id
			GROUP BY customer_name,d.product_name,customer_code
			ORDER BY total_amount desc";

8.	Ubah data payment menjadi "cash" untuk SO yang transaksinya sudah lebih dari 1 minggu dan
payment nya "credit"

	query="tidak ada acuan tanggal untuk melihat transaksi sudah lebih dari 1 minggu";

9. Ubah data payment pada table SO untuk data yang paymentnya tidak sesuai dengan default
payment customer
	query="UPDATE so
			SET payment='cash'
			where so_no in (
			SELECT so_no
			FROM so a inner JOIN customer b on a.customer_id=b.id
			where payment<>default_payment)";

10. Masukkan data baru untuk penjualan SO dengan data sbb:
		Pembeli:Tori
		Tanggal Beli: 20 / 8 / 2O16
		Pembayaran secara cash

		query="INSERT INTO so (id,so_no,customer_id,trans_date,payment)
				VALUES('9','25400001','568','2016-08-20','cash')";

		Detail Barang:
		Celana Jeans 2 pcs

		query="INSERT INTO so_detail (id,product_id,qty,price,discount,so_id)
		VALUES ('','123','2','125000','0','')";

		Kipas Angin 1 pcs dengan diskon 10%

		query="INSERT INTO so_detail (id,product_id,qty,price,discount,so_id)
		VALUES ('','245','1','320000','10','')";
		
		Baju bayi 24 pcs

		query="INSERT INTO so_detail (id,product_id,qty,price,discount,so_id)
		VALUES ('','320','24','56000','0','')";"