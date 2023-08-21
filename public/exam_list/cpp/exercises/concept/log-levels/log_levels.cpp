#include <string>
#include <iostream>

using namespace std;

string message(const string& line) { return line.substr(line.find(':') + 2); }

string log_level(const string& line) {
    return line.substr(1, line.find(']') - 1);
}

string reformat(const string& line) {
    return message(line) + " (" + log_level(line) + ')';
}

int main() {
    string str;
    cin >> str;

    cout << log_level(str) << endl << message(str) << endl << reformat(str);
    return 0;
}