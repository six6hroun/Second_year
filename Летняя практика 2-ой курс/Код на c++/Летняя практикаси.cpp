#include <iostream>
#include <cmath>
#include <omp.h>
#include <vector>
#include <iomanip>
using namespace std;

double function(double x) {
    return sin(x);
}

double integrirovanie(double a, double b, int n) {
    double h = (b - a) / n;
    double sum = 0.0;

#pragma omp parallel for reduction(+:sum)
    for (int i = 0; i < n; i++) {
        double x = a + (i + 0.5) * h;
        sum += function(x);
    }
    return sum * h;
}

double g(double x, double a, double b, int n) {
    return integrirovanie(a, x, n) - b;
}

double dg(double x) {
    return function(x);
}

double newton_metod(double a, double b, double x0, double eps, int max_iter, int n_integral) {
    double x = x0;
    double x_prev;
    int iter = 0;

    do {
        x_prev = x;
        double g_val = g(x_prev, a, b, n_integral);
        double dg_val = dg(x_prev);

        if (fabs(dg_val) < 1e-10) {
            cout << "Производная близка к нулю. Метод Ньютона не сходится." << endl;
            return NAN;
        }

        x = x_prev - g_val / dg_val;
        iter++;

        if (iter > max_iter) {
            cout << "Превышено максимальное число итераций." << endl;
            return NAN;
        }

    } while (fabs(x - x_prev) > eps);
    return x;
}

int main() {
    setlocale(0, "");
    double a = 0.0;
    double b = 1.0;
    double x0 = 1.5;
    double eps = 1e-6;
    int iter = 100;
    int n = 1000;

    vector<int> threads = { 1, 2, 4, 8 };
    vector<double> times(threads.size());
    vector<double> results(threads.size());

    cout << "Метод Ньютона с интегрированием по формуле прямоугольников 1-го порядка" << endl;
    cout << "Параметры: a = " << a << ", b = " << b << ", Начальное приближение = " << x0 << ", Точность = " << eps << ", Кол-во итераций = " << iter << ", Кол-во разбиений = " << n << endl;

    for (size_t i = 0; i < threads.size(); i++) {
        int num_threads = threads[i];
        double start_time = omp_get_wtime();

        omp_set_num_threads(num_threads);
        results[i] = newton_metod(a, b, x0, eps, iter, n);

        double end_time = omp_get_wtime();
        times[i] = end_time - start_time;
    }

    cout << "Результат: x = " << results[0] << endl;
    cout << "Результаты параллельных вычислений:" << endl;
    for (size_t i = 0; i < threads.size(); i++) {
        double speedup = times[0] / times[i];
        double efficiency = speedup / threads[i] * 100;
        cout << "Поток: " << threads[i] << "  Время: " << fixed << setprecision(6) << times[i] << "  Ускорение: " << fixed << setprecision(2) << speedup << "  Эффективность: " << fixed << setprecision(1) << efficiency << "%" << endl;
    }
    return 0;
}