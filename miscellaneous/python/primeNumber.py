# Program to check if a provided number is a prime

num = int(input('Enter a number: '))

# Our number must be greater than 1
if num > 1:

    # Create a range to the provided number
    for i in range(2,num):

        # Check for a divisible number
        if(num % i) == 0:
            print(i,'times',num//i,'is',num,'(not prime)')
            break
    else:
        print(num,'is a prime number')
else:
    print(num,'is not a prime number')
