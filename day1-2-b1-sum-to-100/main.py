def expr(p):
    return "1{}2{}3{}4{}5{}6{}7{}8{}9".format(*p)


def list_to_string(s):
    """Concatenate list to string. Return a string."""
    str1 = ""
    return str1.join(s)


def bruteforce(data, length=None):
    user_input = str(data)
    len_of = int(length)
    combinations_list = [1]
    combinations_list_operator = 1
    zer0 = 0

    while zer0 < len_of:
        combinations_list_operator *= len(user_input)
        combinations_list.append(combinations_list_operator)
        zer0 += 1

    occurrence = combinations_list[-2::-1]
    counter_occurrence = [0 for _ in range(len(occurrence))]
    user_input_indexer = counter_occurrence.copy()

    temporary_var = []
    for _ in range(combinations_list[-1]):
        zer0 = 0
        while zer0 < len_of:
            try:
                temporary_var.append(user_input[user_input_indexer[zer0]])
            except IndexError:
                user_input_indexer[zer0] = 0
                temporary_var.append(user_input[user_input_indexer[zer0]])

            counter_occurrence[zer0] += 1

            if counter_occurrence[zer0] == occurrence[zer0]:
                counter_occurrence[zer0] = 0
                user_input_indexer[zer0] += 1

            zer0 += 1
        yield tuple(temporary_var)
        temporary_var = []


list_ops = [item for item in bruteforce("+- ", length=8)]
all_possible_maths = [expr(p) for p in list_ops]
for math in all_possible_maths:
    try:
        my_math = list_to_string(math).replace(" ", '')
        if eval(my_math) == 100:
            print(f"Found: {my_math} --> {eval(my_math)}")

    except NameError:
        pass
