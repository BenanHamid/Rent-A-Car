Данни за базата се конфигурират в utility/DB.php файла като
по подразбиране хоста е локалния, името на базата: "rent_a_car",
потребител: "root" парола: "root"

Има готова база с няколко записа експортна в папката migrations/rent_a_car.sql
Може да използвате DDL.sql за чиста база.


TODO

1) Make DB class SINGLETON to avoid creating multiple DB objects.
2) Strings for queries
3) DB indexing
4) Controllers should be changed to Classes and handle the functioanlity.
